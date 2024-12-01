<?php

namespace App\Models;

use CodeIgniter\Model;

class Projek extends Model
{
    protected $table            = 'projek';
    protected $primaryKey       = 'id_projek';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_admin', 'judul_projek', 'deskripsi_projek', 'foto_projek'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_dibuat';
    protected $updatedField  = 'tanggal_diubah';
    protected $deletedField  = 'tanggal_dihapus';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProjects()
    {
        return $this->findAll(); 
    }
}
