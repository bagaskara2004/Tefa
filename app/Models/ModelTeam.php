<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTeam extends Model
{
    protected $table            = 'team';
    protected $primaryKey       = 'id_team';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_website', 'name', 'degree', 'photo'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'name' => 'required|min_length[3]|max_length[50]',
        'degree' => 'required|min_length[3]|max_length[100]',
        'photo' => 'required|min_length[3]|max_length[500]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['encryptTeam'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['encryptTeam'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = ['decriptTeam'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $encryption;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        $this->encryption = \Config\Services::encrypter();
    }

    protected function encryptTeam(array $data)
    {
        $data['data']['name'] = $this->encryption->encrypt($data['data']['name']);
        $data['data']['degree'] = $this->encryption->encrypt($data['data']['degree']);

        return $data;
    }

    protected function decriptTeam(array $data)
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
        foreach (['name', 'degree'] as $field) {
            if (!empty($data[$field])) {
                $data[$field] = $this->encryption->decrypt($data[$field]);
            }
        }

        return $data;
    }
}
