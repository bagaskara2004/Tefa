<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFeedback extends Model
{
    protected $table            = 'feedback';
    protected $primaryKey       = 'id_feedback';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user','message','post'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [
        'message' => 'required|min_length[3]|max_length[100]'
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
