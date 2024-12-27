<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\JwtConfig;

class Actived extends BaseController
{
    protected $modelUser;
    protected $encryption;

    public function __construct()
    {
        $this->encryption = \Config\Services::encrypter();
        $this->modelUser = new ModelUser();
    }
    public function index($token)
    {
        if (!$this->request->getPost()) {
            return view('auth/verifikasi',[
                'token' => $token,
                'page' => 'actived'
            ]);
        }

        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token,new Key($jwtConfig->key,$jwtConfig->algorithm));
        $input = $this->request->getVar();
        $combineInput = $input['input1'].$input['input2'].$input['input3'].$input['input4'].$input['input5'].$input['input6'];
        
        $user = $this->modelUser->find($token->id);
        
        if ($combineInput != $user['otp']) {
            return redirect()->back()->withInput()->with('error', 'Kode OTP Invalid');
        }

        $user['actived'] = true;
        $this->modelUser->save($user);
        return redirect()->to(current_url());
    }

    public function resendOtp($token) {
        $jwtConfig = new JwtConfig();
        $tokenDecode = JWT::decode($token,new Key($jwtConfig->key,$jwtConfig->algorithm));

        $user = $this->modelUser->find($tokenDecode->id);
        $user['otp'] = generateKode();

        $this->modelUser->save($user);

        $token = [
            'id' => $tokenDecode->id,
            'iat' => time(),
            'exp' => time() + 3600,
        ];

        $tokenEncode = JWT::encode($token,$jwtConfig->key,$jwtConfig->algorithm);

        $sendMail = sendMail($user['email'], base_url("/auth/actived/$tokenEncode"), $user['otp'], $this->website['email'],'Activate Your Account');
        if (!$sendMail) {
            return redirect()->back()->withInput()->with('error','Failed to send OTP');
        }
        return redirect()->back()->withInput()->with('success','Success send OTP');
    }
}
