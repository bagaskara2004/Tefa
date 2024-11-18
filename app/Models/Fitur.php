<?php

namespace App\Models;

use CodeIgniter\Model;

class Fitur extends Model
{
    protected $table            = 'fitur';
    protected $primaryKey       = 'id_fitur';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = 'nama_fitur';

    // Dates
    protected $useTimestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
