<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\JwtConfig;

class Login extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
    }

    public function index()
    {
        if (!$this->request->getPost()) {
            return view('auth/login');
        }

        $email = htmlspecialchars($this->request->getVar('email'));
        $password = htmlspecialchars($this->request->getVar('password'));
        $remember = $this->request->getVar('remember');
        
        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $user = $this->findUserByEmail($email);
        if (!isset($user)) {
            return redirect()->back()->withInput()->with('error', 'Email not Found');
        }

        if ($user['password'] != $password) {
            return redirect()->back()->withInput()->with('error', 'Wrong Password');
        }

        if ($remember) {
            $jwtConfig = new JwtConfig();
            $token = [
                'id' => $user['id_user'],
                'iat' => time(),
            ];
            $token = JWT::encode($token, $jwtConfig->key, $jwtConfig->algorithm);
            setAppCookie('remember_me', $token);
        }

        session()->set('user', [
            'id' => $user['id_user'],
            'role' => $user['role']
        ]);

        if ($user['role']) {
            return redirect()->to('/admin/dashboard')->withCookies()->with('success', "Selamat Datang " . $user['username']);
        }
        return redirect()->to('/')->withCookies()->with('success', "Selamat Datang " . $user['username']);
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
