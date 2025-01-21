<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\JwtConfig;

class AdminController extends BaseController
{
    protected $modelUser ;

    public function __construct()
    {
        $this->modelUser  = new ModelUser ();
    }

    public function index()
    {
        // Assuming role 1 is for admins
        $data['admins'] = $this->modelUser ->where('role', true)->findAll();
        $data['page'] = 'Admins';
        $data['time'] = $this->time;
        return view('admin/admins/index', $data);
    }

    public function create()
    {
        $data['page'] = 'Teams';
        $data['time'] = $this->time;
        return view('admin/admins/create', $data);
    }

    public function store()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email'    => $this->request->getPost('email'),
            'telp'     => $this->request->getPost('telp'),
            'photo'    => 'fpcdfnizngdcifp8isbm', 
            'otp'      => generateKode(),
            'actived' => false, 
            'role'     => 1 
        ];

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

        // $this->modelUser ->save($data);
        return redirect()->to('/admin/admins')->with('success', 'Admin created successfully.');
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

    public function delete($id)
    {
        $this->modelUser ->delete($id);
        return redirect()->to('/admin/admins')->with('success', 'Admin deleted successfully.');
    }
}