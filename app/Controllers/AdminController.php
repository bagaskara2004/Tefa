<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser ;
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
        // Get the first admin
        $firstAdmin = $this->modelUser ->where('role', true)->first();

        // Get all admins excluding the first one
        $data['admins'] = $this->modelUser ->where('role', true)
                                           ->where('id_user !=', $firstAdmin['id_user']) // Exclude the first admin
                                           ->findAll();
        $data['firstAdmin'] = $firstAdmin; // Store the first admin for reference
        $data['page'] = 'Admins';
        $data['time'] = $this->time;

        return view('admin/admins/index', $data);
    }

    public function create()
    {
        // Check if the current user is the first admin
        if (!$this->isFirstAdmin(session()->get('user')['id'])) {
            return redirect()->to('/admin/admins')->with('error', "You don't have permission to add admins.");
        }

        $data['page'] = 'Admins';
        $data['time'] = $this->time;
        return view('admin/admins/create', $data);
    }

    public function store()
    {
        // Check if the current user is the first admin
        if (!$this->isFirstAdmin(session()->get('user')['id'])) {
            return redirect()->to('/admin/admins')->with('error', "You don't have permission to add admins.");
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email'    => $this->request->getPost('email'),
            'telp'     => $this->request->getPost('telp'),
            'photo'    => 'fpcdfnizngdcifp8isbm',
            'otp'      => generateKode(),
            'actived'  => false,
            'role'     => 1 // Set role to admin
        ];

        $user = $this->findUserByEmail($data['email']);
        if (isset($user)) {
            return redirect()->back()->withInput()->with('error', 'The email must be unique');
        }

        $addUser  = $this->modelUser ->save($data);
        if (!$addUser ) {
            return redirect()->back()->withInput()->with('errorarray', $this->modelUser ->errors());
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

        return redirect()->to('/admin/admins')->with('success', 'Admin created successfully.');
    }

    public function delete($id)
    {
        // Check if the current user is the first admin
        if (!$this->isFirstAdmin(session()->get('user')['id'])) {
            return redirect()->to('/admin/admins')->with('error', "You don't have permission to delete admins.");
        }

        $this->modelUser ->delete($id);
        return redirect()->to('/admin/admins')->with('success', 'Admin deleted successfully.');
    }

    private function isFirstAdmin($userId)
    {
        // Get the first admin
        $firstAdmin = $this->modelUser ->where('role', true)->first();
        return $firstAdmin['id_user'] === $userId; // Check if the current user is the first admin
    }

    private function findUserByEmail($email)
    {
        $data = $this->modelUser ->findAll();
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