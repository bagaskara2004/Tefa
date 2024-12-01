<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProjectType extends Model
{
    protected $table            = 'projecttype';
    protected $primaryKey       = 'id_projecttype';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_type','id_project'];
}
