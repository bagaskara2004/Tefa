<?php

namespace App\Models;

use CodeIgniter\Model;

class Status extends Model
{
    protected $table            = 'status';
    protected $primaryKey       = 'id_status';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_status'];

    // Dates
    protected $useTimestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
