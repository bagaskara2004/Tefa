<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Team extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_team' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_website' => [
                'type'           => 'INT',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'degree' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'photo' => [
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
        $this->forge->addKey('id_team', true);
        $this->forge->addForeignKey('id_website', 'Website', 'id_website');
        $this->forge->createTable('Team');
    }

    public function down()
    {
        $this->forge->dropTable('Team');
    }
}
