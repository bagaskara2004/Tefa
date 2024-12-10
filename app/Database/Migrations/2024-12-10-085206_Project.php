<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Project extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_project' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_website' => [
                'type'           => 'INT',
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '1000',
            ],
            'photo' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'url' => [
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
        $this->forge->addKey('id_project', true);
        $this->forge->addForeignKey('id_website', 'Website', 'id_website');
        $this->forge->createTable('Project');
    }

    public function down()
    {
        $this->forge->dropTable('Project');
    }
}
