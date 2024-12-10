<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMitra extends Model
{
    protected $table            = 'mitra';
    protected $primaryKey       = 'id_mitra';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_website','name','logo','link'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'name' => 'required|min_length[2]|max_length[50]|alpha_numeric',
        'logo' => 'required|min_length[5]|max_length[500]',
        'link' => 'required|min_length[5]|max_length[500]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
    }
}
