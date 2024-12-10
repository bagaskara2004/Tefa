<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Website extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_website' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'location' => [
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
        $this->forge->addKey('id_website', true);
        $this->forge->createTable('Website');
    }

    public function down()
    {
        $this->forge->dropTable('Website');
    }
}
