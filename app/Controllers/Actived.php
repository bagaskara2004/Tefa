<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;

class Actived extends BaseController
{
    protected $modelUser;
    protected $encryption;

    public function __construct()
    {
        $this->encryption = \Config\Services::encrypter();
        $this->modelUser = new ModelUser();
    }
    public function index()
    {
        if (!$this->request->getPost()) {
            return view('user/actived');
        }

        $user = $this->findUser();
        $input = $this->combineInput($this->request->getVar());

        if ($input != $user['otp']) {
            return redirect()->back()->withInput()->with('error', 'Kode OTP Invalid');
        }
        $user['actived'] = true;
        $this->modelUser->save($user);
        session()->remove('email_user');
        return redirect()->to('/auth/loginuser')->with('success', 'Your account active');
    }

    public function findUser()
    {
        $email = $this->encryption->decrypt(session()->get('email_user'));
        $users = $this->modelUser->orderBy('id_user', 'DESC')->findAll();
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                return $user;
            }
        }
    }

    public function combineInput($input)
    {
        $results = '';
        foreach ($input as $row) {
            $results .= $row;
        }
        return $results;
    }

    public function resendOtp() {
        $user = $this->findUser();
        $user['otp'] = generateOtp();

        $updateUser = $this->modelUser->save($user);
        if (!$updateUser) {
            return redirect()->back()->withInput()->with('error','Failed Actived, try again');
        }

        $sendMail = sendMail($user['email'],$user['otp']);
        if (!$sendMail) {
            return redirect()->back()->withInput()->with('error','Failed to send OTP');
        }
        
        return redirect()->back()->withInput()->with('success','Success send OTP');
    }
}
