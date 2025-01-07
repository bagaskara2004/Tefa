<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelChat extends Model
{
    protected $table            = 'chat';
    protected $primaryKey       = 'id_chat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_admin','id_user','id_order','message','admin_read','user_read'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'message' => 'required|min_length[3]|max_length[50]|alpha_numeric'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['encryptChat'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['encryptChat'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = ['decriptChat'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $encryption;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        $this->encryption = \Config\Services::encrypter();
    }

    protected function encryptChat(array $data)
    {
        $data['data']['message'] = $this->encryption->encrypt($data['data']['username']);
        return $data;
    }

    protected function decriptChat(array $data)
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
        foreach (['message'] as $field) {
            if (!empty($data[$field])) {
                $data[$field] = $this->encryption->decrypt($data[$field]);
            }
        }
        return $data;
    }
}
