<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'email', 'otp', 'actived', 'role'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'username' => 'required|min_length[3]|max_length[15]|alpha_numeric',
        'password' => 'required|min_length[5]|max_length[50]',
        'email' => 'required|valid_email|min_length[10]|max_length[50]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['encryptUser'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['encryptUser'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = ['decriptUser'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $encryption;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        $this->encryption = \Config\Services::encrypter();
    }

    protected function encryptUser(array $data)
    {
        $data['data']['username'] = $this->encryption->encrypt($data['data']['username']);
        $data['data']['password'] = $this->encryption->encrypt($data['data']['password']);
        $data['data']['email'] = $this->encryption->encrypt($data['data']['email']);
        $data['data']['otp'] = $this->encryption->encrypt($data['data']['otp']);

        return $data;
    }

    protected function decriptUser(array $data)
    {
        if (isset($data['data']) && is_array($data['data']) && !isset($data['data'][0])) {
            $data['data'] = $this->decryptData($data['data']);
        } else if (isset($data['data']) && is_array($data['data'][0])) {
            foreach ($data['data'] as $key => $record) {
                $data['data'][$key] = $this->decryptData($record);
            }
        }
        return $data;
    }

    private function decryptData(array $data)
    {
        foreach (['username', 'password', 'email', 'otp'] as $field) {
            if (!empty($data[$field])) {
                $data[$field] = $this->encryption->decrypt($data[$field]);
            }
        }

        return $data;
    }
}
