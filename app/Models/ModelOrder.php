<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOrder extends Model
{
    protected $table            = 'order';
    protected $primaryKey       = 'id_order';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_status','id_user','title','description'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'title' => 'required|min_length[3]|max_length[25]|alpha_numeric',
        'description' => 'required|min_length[20]|max_length[1000]|alpha_numeric',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['encryptOrder'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['encryptOrder'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = ['decriptOrder'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $encryption;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        $this->encryption = \Config\Services::encrypter();
    }

    protected function encryptOrder(array $data)
    {
        $data['data']['title'] = $this->encryption->encrypt($data['data']['title']);
        return $data;
    }

    protected function decriptOrder(array $data)
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
        foreach (['title'] as $field) {
            if (!empty($data[$field])) {
                $data[$field] = $this->encryption->decrypt($data[$field]);
            }
        }

        return $data;
    }
}
