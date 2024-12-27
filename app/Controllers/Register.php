<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\JwtConfig;

class Register extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
    }

    public function index()
    {
        if (!$this->request->getPost()) {
            return view('auth/register');
        }

        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'password' => htmlspecialchars($this->request->getVar('password')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'photo' => 'fpcdfnizngdcifp8isbm.png',
            'otp' => generateKode(),
            'actived' => false,
            'role' => false
        ];

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $user = $this->findUserByEmail($data['email']);
        if (isset($user)) {
            return redirect()->back()->withInput()->with('error', 'The email must be unique');
        }

        $addUser = $this->modelUser->save($data);
        if (!$addUser) {
            return redirect()->back()->withInput()->with('errorarray', $this->modelUser->errors());
        }

        $jwt = new JwtConfig();
        $token = [
            'id' => $this->modelUser->getInsertID(),
            'iat' => time(),
            'exp' => time() + 1800,
        ];
        $token = JWT::encode($token, $jwt->key, $jwt->algorithm);

        $sendMail = sendMail($data['email'], base_url("/auth/actived/$token"), $data['otp'], $this->website['email'],'Activate Your Account');
        if (!$sendMail) {
            return redirect()->back()->withInput()->with('error', 'Failed to send email');
        }

        return redirect()->back()->with('success','Check your email to activate your account');
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
