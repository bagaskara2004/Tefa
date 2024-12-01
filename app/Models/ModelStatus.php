<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStatus extends Model
{
    protected $table            = 'status';
    protected $primaryKey       = 'id_status';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['status'];

    // Validation
    protected $validationRules      = [
        'status' => 'required|min_length[3]|max_length[50]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
