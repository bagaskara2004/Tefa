<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\ModelWebsite;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\JwtConfig;

class Api extends ResourceController
{
    protected $modelUser;
    protected $encryption;
    protected $website;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
        $this->encryption = \Config\Services::encrypter();
        $modelWebsite = new ModelWebsite();
        $data = $modelWebsite->first();
        $this->website = $data;
        date_default_timezone_set('Asia/Makassar');
    }

    public function register()
    {
        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'password' => htmlspecialchars($this->request->getVar('password')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'photo' => 'fpcdfnizngdcifp8isbm',
            'otp' => generateKode(),
            'actived' => false,
            'role' => false
        ];

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return $this->fail('Recaptcha is not valid', 400);
        }

        $user = $this->findUserByEmail($data['email']);
        if (isset($user)) {
            return $this->fail('The email must be unique', 400);
        }

        $addUser = $this->modelUser->save($data);
        if (!$addUser) {
            return $this->failValidationErrors($this->modelUser->errors());
        }

        $jwt = new JwtConfig();
        $token = [
            'id' => $this->modelUser->getInsertID(),
            'iat' => time(),
            'exp' => time() + 1800,
        ];
        $token = JWT::encode($token, $jwt->key, $jwt->algorithm);

        $sendMail = sendMail($data['email'], base_url("/auth/actived/$token"), $data['otp'], $this->website['email'], 'Activate Your Account');
        if (!$sendMail) {
            return $this->fail('Failed to send email', 400);
        }

        return $this->respond([
            'status' => 201,
            'message' => 'Success created user',
            'data' => [
                'username' => $data['username'],
                'password' => $data['password'],
                'email' => $data['email']
            ]
        ], 201);
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return $this->fail('Recaptcha is not valid', 400);
        }

        $user = $this->findUserByEmail($email);
        if (!isset($user)) {
            return $this->fail('Email not Found', 400);
        }

        if ($user['password'] != $password) {
            return $this->fail('Wrong Password', 400);
        }

        $jwtConfig = new JwtConfig();
        $token = [
            'id' => $user['id_user'],
            'iat' => time(),
            'exp' => time() + 604800,
        ];
        $token = JWT::encode($token, $jwtConfig->key, $jwtConfig->algorithm);

        return $this->respond([
            'status' => 201,
            'message' => 'Login Success',
            'token' => $token
        ], 201);
    }


    public function forgot()
    {
        $email = $this->request->getVar('email');
        $newPassword = $this->request->getVar('password');

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return $this->fail('Recaptcha is not valid', 400);
        }

        $user = $this->findUserByEmail($email);
        if (!isset($user)) {
            return $this->fail('Email not Found', 400);
        }

        $rules = [
            'password' => 'required|min_length[5]|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $this->failValidationErrors($this->validator->getErrors());
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
            return $this->fail('Failed to send email', 400);
        }
        return $this->respond([
            'status' => 201,
            'message' => 'Success forgot password',
            'data' => [
                'email' => $email,
                'newpassword' => $newPassword,
            ]
        ], 201);
    }

    public function getUser()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $data = $this->modelUser->find($token->id);
        return $this->respond([
            'status' => 201,
            'message' => 'Success find user',
            'data' => $data
        ], 201);
    }

    private function findUserByEmail($email)
    {
        $data = $this->modelUser->findAll();
        foreach ($data as $row) {
            if ($row['actived'] && $row['role'] == 0) {
                if ($row['email'] == $email) {
                    return $row;
                }
            }
        }
        return null;
    }
}
