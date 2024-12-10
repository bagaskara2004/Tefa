<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Media extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_media' => [
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
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->addKey('id_media', true);
        $this->forge->addForeignKey('id_website', 'Website', 'id_website');
        $this->forge->createTable('Media');
    }

    public function down()
    {
        $this->forge->dropTable('Media');
    }
}
