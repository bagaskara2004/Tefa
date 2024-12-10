<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Feedback extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_feedback' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'           => 'INT',
            ],
            'message' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'post' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
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
        $this->forge->addKey('id_feedback', true);
        $this->forge->addForeignKey('id_user', 'User', 'id_user');
        $this->forge->createTable('Feedback');
    }

    public function down()
    {
        $this->forge->dropTable('Feedback');
    }
}
