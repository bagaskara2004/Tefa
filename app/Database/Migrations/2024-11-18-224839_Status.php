<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nama_status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ]
        ]);
        $this->forge->addKey('id_status', true);
        $this->forge->createTable('Status');
    }

    public function down()
    {
        $this->forge->dropTable('Status');
    }
}
