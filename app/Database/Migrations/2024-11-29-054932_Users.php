<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'otp' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'actived' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
            ],
            'role' => [
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
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('User');
    }

    public function down()
    {
        $this->forge->dropTable('User');
    }
}
