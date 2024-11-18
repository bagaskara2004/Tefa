<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminHasFitur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'           => 'INT',
            ],
            'id_fitur' => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addKey(['id_fitur','id_admin'], true);
        $this->forge->addForeignKey('id_admin', 'Admin', 'id_admin');
        $this->forge->addForeignKey('id_fitur', 'Fitur', 'id_fitur');
        $this->forge->createTable('AdminHasFitur');
    }

    public function down()
    {
        $this->forge->dropTable('AdminHasFitur');
    }
}
