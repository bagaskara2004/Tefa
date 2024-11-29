<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_order' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_status' => [
                'type'           => 'INT',
            ],
            'id_user' => [
                'type'           => 'INT',
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'description' => [
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
            ]
        ]);
        $this->forge->addKey('id_order', true);
        $this->forge->addForeignKey('id_status', 'Status', 'id_status');
        $this->forge->addForeignKey('id_user', 'User', 'id_user');
        $this->forge->createTable('Order');
    }

    public function down()
    {
        $this->forge->dropTable('Order');
    }
}
