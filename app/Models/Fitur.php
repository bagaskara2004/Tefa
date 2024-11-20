<?php

namespace App\Models;

use CodeIgniter\Model;

class Fitur extends Model
{
    protected $table            = 'fitur';
    protected $primaryKey       = 'id_admin';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_admin','dashboard','pesanan','projek','admin'];

    // Dates
    protected $useTimestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
