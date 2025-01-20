<?php

namespace App\Controllers;

use App\Models\ModelChat;
use App\Models\ModelFeedback;
use App\Models\ModelOrder;
use App\Models\ModelOrderType;
use App\Models\ModelType;
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
    protected $modelOrder;
    protected $encryption;
    protected $website;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
        $this->modelOrder = new ModelOrder();
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
            'telp' => htmlspecialchars($this->request->getVar('telp')),
            'photo' => 'fpcdfnizngdcifp8isbm',
            'otp' => generateKode(),
            'actived' => false,
            'role' => false
        ];

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
        $email = htmlspecialchars($this->request->getVar('email'));
        $password = htmlspecialchars($this->request->getVar('password'));

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
        $email = htmlspecialchars($this->request->getVar('email'));
        $newPassword = htmlspecialchars($this->request->getVar('password'));

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

    public function order()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));
        $modelOrderType = new ModelOrderType();

        $data = [
            'id_status' => 1,
            'id_user' => $token->id,
            'title' => htmlspecialchars($this->request->getVar('judul')),
            'description' => htmlspecialchars($this->request->getVar('description'))
        ];

        $types = $this->request->getVar('type');
        if (!isset($types)) {
            return $this->fail('Select at least one type', 400);
        }

        $order = $this->modelOrder->save($data);
        if (!$order) {
            return $this->failValidationErrors($this->modelOrder->errors());
        }

        foreach ($types as $type) {
            $modelOrderType->save([
                'id_type' => $type,
                'id_order' => $this->modelOrder->getInsertID()
            ]);
        }

        return $this->respond([
            'status' => 201,
            'message' => 'Success add order',
            'data' => [
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => $data['id_status']
            ]
        ], 201);
    }

    public function getOrder()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $data = $this->modelOrder->select('order.*,status.status,GROUP_CONCAT(type.type ORDER BY type.type SEPARATOR ", ") AS types')->join('ordertype', 'order.id_order = ordertype.id_order', 'left')->join('type', 'ordertype.id_type = type.id_type', 'left')->join('status', 'id_status', 'id_status')->where('id_user', $token->id)->groupBy('order.id_order, order.title')->orderBy('order.id_order', 'DESC')->findAll();
        if (empty($data)) {
            return $this->fail('No orders yet', 400);
        }
        return $this->respond([
            'status' => 201,
            'message' => 'Success find order',
            'data' => $data
        ], 201);
    }

    public function detailOrder($id)
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $data = $this->modelOrder->select('order.*,status.status,GROUP_CONCAT(type.type ORDER BY type.type SEPARATOR ", ") AS types')->join('ordertype', 'order.id_order = ordertype.id_order', 'left')->join('type', 'ordertype.id_type = type.id_type', 'left')->join('status', 'id_status', 'id_status')->where('id_user', $token->id)->groupBy('order.id_order, order.title')->find($id);

        if (!isset($data)) {
            return $this->fail('Order not found', 400);
        }
        return $this->respond([
            'status' => 201,
            'message' => 'Success find order',
            'data' => $data
        ], 201);
    }

    public function deleteOrder()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $id = htmlspecialchars($this->request->getVar('id_order'));
        $order = $this->modelOrder->find($id);

        if (!isset($order)) {
            return $this->fail('Order not found', 400);
        }

        if ($order['id_user'] != $token->id || $order['id_status'] == 2) {
            return $this->fail("You can't delete this order", 400);
        }
        $this->modelOrder->delete($id);
        return $this->respond([
            'status' => 201,
            'message' => 'Success delete order'
        ], 201);
    }

    public function getType()
    {
        $modelType = new ModelType();
        $data = $modelType->findAll();
        return $this->respond([
            'status' => 201,
            'message' => 'Success find type',
            'data' => $data
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

    public function getMessage($idOrder)
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $modelChat = new ModelChat();
        $modelOrder = new ModelOrder();

        $order = $modelOrder->find($idOrder);
        if (!$order) {
            return $this->fail('Order not found', 404);
        }
        if ($order['id_user'] != $token->id || $order['id_status'] != 2) {
            return $this->fail('Cant access message', 404);
        }
        $data = $modelChat->where('id_order', $idOrder)->orderBy('id_chat', 'DESC')->findAll();
        return $this->respond([
            'status' => 201,
            'message' => 'Success get message',
            'data' => $data
        ], 201);
    }

    public function sendMessage()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $modelChat = new ModelChat();
        $modelOrder = new ModelOrder();

        $data = [
            'id_order' => htmlspecialchars($this->request->getVar('id_order')),
            'message' => htmlspecialchars($this->request->getVar('message')),
            'id_sender' => $token->id,
        ];

        $order = $modelOrder->find($data['id_order']);
        if (!$order) {
            return $this->fail('Order not found', 404);
        }

        if ($order['id_user'] != $token->id || $order['id_status'] != 2) {
            return $this->fail('Cant send message to this order', 404);
        }

        $send = $modelChat->save($data);
        if (!$send) {
            return $this->failValidationErrors($modelChat->errors());
        }
        return $this->respond([
            'status' => 201,
            'message' => 'Success send message',
            'data' => $data
        ], 201);
    }

    public function feedback()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $modelFeedback = new ModelFeedback();

        $data = [
            'id_user' => $token->id,
            'message' => htmlspecialchars($this->request->getVar('message')),
            'post' => false
        ];

        $feedback = $modelFeedback->save($data);
        if (!$feedback) {
            return $this->failValidationErrors($modelFeedback->errors());
        }

        return $this->respond([
            'status' => 201,
            'message' => 'Success send feedback',
            'data' => $data
        ], 201);
    }

    public function editProfile()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authHeader);
        $jwtConfig = new JwtConfig();
        $token = JWT::decode($token, new Key($jwtConfig->key, $jwtConfig->algorithm));

        $modelUser = new ModelUser();
        $file = $this->request->getFile('photo');

        $data = $modelUser->find($token->id);
        $data['username'] = htmlspecialchars($this->request->getVar('username'));
        $data['telp'] = htmlspecialchars($this->request->getVar('telp'));
        $editUser = $modelUser->save($data);
        if (!$editUser) {
            return $this->failValidationErrors($modelUser->errors());
        }
        if (!$file->isValid() && !$this->request->getVar('default')) {
            return $this->respond([
                'status' => 201,
                'message' => 'Success edit profile',
                'data' => $data
            ], 201);
        }

        if ($this->request->getVar('default')) {
            $data['photo'] = 'fpcdfnizngdcifp8isbm';
        } else {
            if ($file->isValid() && !$file->hasMoved()) {
                $ext = $file->getClientExtension();
                $valid = ['jpg', 'jpeg', 'png'];
                if (!in_array($ext, $valid)) {
                    return $this->fail("can't upload photo", 400);
                }
                $result = cloudinaryUpload($file->getRealPath());
                if (!isset($result)) {
                    return $this->fail("can't upload photo", 400);
                }
                $data['photo'] = $result;
            } else {
                return $this->fail("can't upload photo", 400);
            }
        }
        $modelUser->save($data);
        return $this->respond([
            'status' => 201,
            'message' => 'Success edit profile',
            'data' => $data
        ], 201);
    }
}
