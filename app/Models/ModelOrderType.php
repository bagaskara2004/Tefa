<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOrderType extends Model
{
    protected $table            = 'ordertype';
    protected $primaryKey       = 'id_ordertype';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_type','id_order'];
}
