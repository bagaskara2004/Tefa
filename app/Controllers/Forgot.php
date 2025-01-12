<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\JwtConfig;

class Forgot extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
    }

    public function index()
    {
        if (!$this->request->getPost()) {
            return view('auth/forgot');
        }
        $email = htmlspecialchars($this->request->getVar('email'));
        $newPassword = htmlspecialchars($this->request->getVar('password'));

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $user = $this->findUserByEmail($email);
        if (!isset($user)) {
            return redirect()->back()->withInput()->with('error', 'Email not Found');
        }

        $rules = [
            'password' => 'required|min_length[5]|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errorarray', $this->validator->getErrors());
        }

        $jwtConfig = new JwtConfig();
        $token = [
            'id' => $user['id_user'],
            'newPassword' => $newPassword,
            'iat' => time(),
            'exp' => time() + 1800,
        ];
        $token = JWT::encode($token, $jwtConfig->key, $jwtConfig->algorithm);

        $user['otp'] = generateKode();
        $this->modelUser->save($user);

        $sendMail = sendMail($user['email'], base_url("/auth/forgot/$token"), $user['otp'], $this->website['email'], 'Forget Password');
        if (!$sendMail) {
            return redirect()->back()->withInput()->with('error', 'Failed to send email');
        }
        return redirect()->to('/auth/login')->withInput()->with('success', 'Check your email to change password');
    }

    public function changePassword($token)
    {
        if (!$this->request->getPost()) {
            return view('auth/verifikasi', [
                'token' => $token,
                'page' => 'forgot'
            ]);
        }

        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));
        $input = $this->request->getVar();
        $combineInput = $input['input1'] . $input['input2'] . $input['input3'] . $input['input4'] . $input['input5'] . $input['input6'];
        $user = $this->modelUser->find($token->id);
        if ($combineInput != $user['otp']) {
            return redirect()->back()->withInput()->with('error', 'Kode OTP Invalid');
        }
        $user['password'] = $token->newPassword;
        $this->modelUser->save($user);

        return view('errors/html/costum', [
            'title' => 'Done',
            'message' => 'Your password has been changed'
        ]);
    }

    public function resendOtp($token) {
        $jwtConfig = new JwtConfig();
        $tokenDecode = JWT::decode($token,new Key($jwtConfig->key,$jwtConfig->algorithm));

        $user = $this->modelUser->find($tokenDecode->id);
        $user['otp'] = generateKode();

        $this->modelUser->save($user);

        $token = [
            'id' => $tokenDecode->id,
            'newPassword' => $tokenDecode->newPassword,
            'iat' => time(),
            'exp' => time() + 3600,
        ];

        $tokenEncode = JWT::encode($token,$jwtConfig->key,$jwtConfig->algorithm);

        $sendMail = sendMail($user['email'], base_url("/auth/forgot/$tokenEncode"), $user['otp'], $this->website['email'],'Forget Password');
        if (!$sendMail) {
            return redirect()->back()->withInput()->with('error','Failed to send OTP');
        }
        return redirect()->back()->withInput()->with('success','Success send OTP');
    }

    private function findUserByEmail($email)
    {
        $data = $this->modelUser->findAll();
        foreach ($data as $row) {
            if ($row['actived']) {
                if ($row['email'] == $email) {
                    return $row;
                }
            }
        }
        return null;
    }
}
