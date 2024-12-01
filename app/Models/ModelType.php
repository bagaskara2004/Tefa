<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelType extends Model
{
    protected $table            = 'type';
    protected $primaryKey       = 'id_type';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['type'];

    // Validation
    protected $validationRules      = [
        'type' => 'required|min_length[3]|max_length[50]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
