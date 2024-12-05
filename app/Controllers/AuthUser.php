<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;

class AuthUser extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
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
            'otp' => $this->generateOtp(),
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

        $activate = $this->sendMail($data['email'],$data['otp']);
        if (!$activate) {
            return redirect()->back()->withInput()->with('error','Failed to send email');
        }

        return redirect()->to('/loginuser')->with('success','Success create account');
    }

    private function generateOtp()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $otp = '';

        for ($i = 0; $i < 6; $i++) {
            $otp .= $characters[rand(0, $charactersLength - 1)];
        }
        return $otp;
    }

    private function sendMail($email,$otp) {
        $emailService = \Config\Services::email();
        $emailService->setFrom('testing20041120@gmail.com', 'Tefa');
        $emailService->setTo($email);
        $emailService->setSubject('Activate your account');
        $emailService->setMessage("Kode OTP = $otp");
        if ($emailService->send()) {
            return true;
        }
        return false;
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
