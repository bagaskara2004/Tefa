<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fitur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'       => 'INT',
            ],
            'dashboard' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
            ],
            'pesanan' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
            ],
            'projek' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
            ],
            'admin' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id_admin', true); // Primary key
        $this->forge->addForeignKey('id_admin', 'admin', 'id_admin', 'CASCADE', 'CASCADE');
        $this->forge->createTable('fitur');
    }

    public function down()
    {
        $this->forge->dropTable('fitur');
    }
}
