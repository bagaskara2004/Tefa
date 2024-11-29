<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Type extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_type' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ]
        ]);
        $this->forge->addKey('id_type', true);
        $this->forge->createTable('Type');
    }

    public function down()
    {
        $this->forge->dropTable('Type');
    }
}
