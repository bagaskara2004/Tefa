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
    protected $allowedFields    = ['id_website','title','description','photo','url'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'title' => 'required|min_length[3]|max_length[50]',
        'description' => 'required|min_length[20]|max_length[1000]',
        'photo' => 'required|max_length[500]',
        'url' => 'required|max_length[500]',
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
