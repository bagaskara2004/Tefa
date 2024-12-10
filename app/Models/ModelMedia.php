<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMedia extends Model
{
    protected $table            = 'media';
    protected $primaryKey       = 'id_media';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_website','name','link','icon'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'name' => 'required|min_length[3]|max_length[50]|alpha_numeric',
        'link' => 'required|min_length[3]|max_length[500]|',
        'icon' => 'required|min_length[3]|max_length[50]|',
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
