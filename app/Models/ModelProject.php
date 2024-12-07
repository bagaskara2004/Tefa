<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProject extends Model
{
    protected $table            = 'project';
    protected $primaryKey       = 'id_project';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_admin','title','description','photo','url'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'title' => 'required|min_length[3]|max_length[25]|alpha_numeric',
        'description' => 'required|min_length[20]|alpha_numeric',
        'photo' => 'required',
        'url' => 'required',
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
