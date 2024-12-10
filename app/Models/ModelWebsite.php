<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWebsite extends Model
{
    protected $table            = 'website';
    protected $primaryKey       = 'id_website';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'location'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'email' => 'required|valid_email|min_length[10]|max_length[50]',
        'location' => 'required|min_length[3]|max_length[500]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['encryptWebsite'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['encryptWebsite'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = ['decriptWebsite'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $encryption;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        $this->encryption = \Config\Services::encrypter();
    }

    protected function encryptWebsite(array $data)
    {
        $data['data']['email'] = $this->encryption->encrypt($data['data']['email']);

        return $data;
    }

    protected function decriptWebsite(array $data)
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
        foreach (['email'] as $field) {
            if (!empty($data[$field])) {
                $data[$field] = $this->encryption->decrypt($data[$field]);
            }
        }

        return $data;
    }
}
