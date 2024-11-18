<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fitur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_fitur' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nama_fitur' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ]
        ]);
        $this->forge->addKey('id_fitur', true);
        $this->forge->createTable('Fitur');
    }

    public function down()
    {
        $this->forge->dropTable('Fitur');
    }
}
