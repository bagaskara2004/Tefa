<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nama_admin' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'password_admin' => [
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
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('Admin');
    }

    public function down()
    {
        $this->forge->dropTable('Admin');
    }
}
