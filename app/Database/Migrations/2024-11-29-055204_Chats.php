<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chats extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_chat' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_sender' => [
                'type'       => 'INT',
            ],
            'id_order' => [
                'type'       => 'INT',
            ],
            'message' => [
                'type'       => 'VARCHAR',
                'constraint' => '1000',
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
        $this->forge->addKey('id_chat', true);
        $this->forge->addForeignKey('id_sender', 'User', 'id_user');
        $this->forge->addForeignKey('id_order', 'Order', 'id_order');
        $this->forge->createTable('Chat');
    }

    public function down()
    {
        $this->forge->dropTable('Chat');
    }
}
