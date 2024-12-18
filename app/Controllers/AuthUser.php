<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;
use CodeIgniter\Cookie\Cookie;
use DateTime;

class AuthUser extends BaseController
{
    protected $modelUser;
    protected $encryption;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
        $this->encryption = \Config\Services::encrypter();
    }

    public function login()
    {
        if (!$this->request->getPost()) {
            return view('user/login');
        }
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $remember = $this->request->getVar('remember');

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $user = $this->findUser($email);
        if (!isset($user)) {
            return redirect()->back()->withInput()->with('error', 'Email not Found');
        }

        if ($user['password'] != $password) {
            return redirect()->back()->withInput()->with('error', 'Wrong Password');
        }

        if ($remember) {
            setAppCookie('remember_me', base64_encode($this->encryption->encrypt($user['id_user'])));
        }
        session()->set('user', $user['id_user']);

        if ($user['role']) {
            return redirect()->to('/admin/dashboard')->withCookies()->with('success', "Selamat Datang " . $user['username']);
        }
        return redirect()->to('/')->withCookies()->with('success', "Selamat Datang " . $user['username']);
    }

    public function register()
    {
        if (!$this->request->getPost()) {
            return view('user/register');
        }

        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'password' => htmlspecialchars($this->request->getVar('password')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'photo' => 'default.jpg',
            'otp' => generateKode(),
            'actived' => false,
            'role' => false
        ];

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $user = $this->findUser($data['email']);
        if (isset($user)) {
            return redirect()->back()->withInput()->with('error', 'The email must be unique');
        }

        $addUser = $this->modelUser->save($data);
        if (!$addUser) {
            return redirect()->back()->withInput()->with('errorarray', $this->modelUser->errors());
        }

        $sendMail = sendMail($data['email'], $data['otp'], $this->website['email']);
        if (!$sendMail) {
            return redirect()->back()->withInput()->with('error', 'Failed to send email');
        }

        $token = $this->encryption->encrypt($data['email']);
        session()->set('actived_token', $token);
        return redirect()->to("/actived/form");
    }

    private function findUser($email)
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
