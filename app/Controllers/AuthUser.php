<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;

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
    }

    public function register() {
        if (!$this->request->getPost()) {
            return view('user/register');
        }

        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'password' => htmlspecialchars($this->request->getVar('password')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'otp' => generateOtp(),
            'actived' => false,
            'role' => false
        ];

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp,$response)) {
            return redirect()->back()->withInput()->with('error','Recaptcha is not valid');
        }

        if ($this->chekEmail($data['email'])) {
            return redirect()->back()->withInput()->with('error','The email must be unique');
        }

        $addUser = $this->modelUser->save($data);
        if (!$addUser) {
            return redirect()->back()->withInput()->with('errorarray',$this->modelUser->errors());
        }

        $sendMail = sendMail($data['email'],$data['otp']);
        if (!$sendMail) {
            return redirect()->back()->withInput()->with('error','Failed to send email');
        }

        $token = $this->encryption->encrypt($data['email']);
        session()->set('email_user', $token);
        return redirect()->to("/actived/form");
    }

    private function chekEmail($email)
    {
        $data = $this->modelUser->findAll();
        foreach ($data as $row) {
            if ($row['actived']) {
                if ($row['email'] == $email) {
                    return true;
                }
            }
        }
        return false;
    }
}
