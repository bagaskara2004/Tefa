<?php

namespace App\Controllers;

use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class ApiUser extends ResourceController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new ModelUser();
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $results = $this->modelUser->findAll();
        if (!empty($results)) {
            return $this->respond([
                'status' => 200,
                'message' => 'success',
                'data' => $results
            ], 200);
        }
        return $this->fail([
            'message' => 'No User'
        ],400);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'email' => $this->request->getVar('email'),
            'otp' => $this->generateOtp(),
            'actived' => false,
            'role' => false
        ];

        if ($this->chekEmail($data['email'])) {
            return $this->failValidationErrors([
                'email' => 'The email must be unique'
            ]);
        }

        $addUser = $this->modelUser->save($data);
        if (!$addUser) {
            return $this->failValidationErrors($this->modelUser->errors());
        }

        $activate = $this->sendMail($data['email'],$data['otp']);
        if (!$activate) {
            return $this->fail([
                'message' => 'failed to send email'
            ], 400);;
        }

        return $this->respondCreated($data);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
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
