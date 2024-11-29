<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProjectType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_projecttype' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_type' => [
                'type'       => 'INT',
            ],
            'id_project' => [
                'type'       => 'INT',
            ],
        ]);
        $this->forge->addKey('id_projecttype', true);
        $this->forge->addForeignKey('id_type', 'Type', 'id_type');
        $this->forge->addForeignKey('id_project', 'Project', 'id_project');
        $this->forge->createTable('ProjectType');
    }

    public function down()
    {
        $this->forge->dropTable('ProjectType');
    }
}
