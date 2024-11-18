<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Projek extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_projek' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type'           => 'INT',
            ],
            'judul_projek' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'deskripsi_projek' => [
                'type'       => 'VARCHAR',
                'constraint' => '1000',
            ],
            'foto_projek' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'tanggal_dibuat' => [
                'type'       => 'datetime',
                'null'       => True
            ],
            'tanggal_diubah' => [
                'type'       => 'datetime',
                'null'       => True
            ],
            'tanggal_dihapus' => [
                'type'       => 'datetime',
                'null'       => True
            ],
        ]);
        $this->forge->addKey('id_projek', true);
        $this->forge->addForeignKey('id_admin', 'Admin', 'id_admin');
        $this->forge->createTable('Projek');
    }

    public function down()
    {
        $this->forge->dropTable('Projek');
    }
}
