<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mitra extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mitra' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_website' => [
                'type'           => 'INT',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'created' => [
                'type'       => 'datetime',
                'null'       => True
            ],
            'updated' => [
                'type'       => 'datetime',
                'null'       => True
            ],
            'deleted' => [
                'type'       => 'datetime',
                'null'       => True
            ],
        ]);
        $this->forge->addKey('id_mitra', true);
        $this->forge->addForeignKey('id_website', 'Website', 'id_website');
        $this->forge->createTable('Mitra');
    }

    public function down()
    {
        $this->forge->dropTable('Mitra');
    }
}
