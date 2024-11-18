<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminHasFitur extends Model
{
    protected $table            = 'adminhasfitur';
    protected $primaryKey       = ['id_admin','id_fitur'];
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_admin','id_fitur'];

    // Dates
    protected $useTimestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
