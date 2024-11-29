<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ordertype' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_type' => [
                'type'       => 'INT',
            ],
            'id_order' => [
                'type'       => 'INT',
            ],
        ]);
        $this->forge->addKey('id_ordertype', true);
        $this->forge->addForeignKey('id_type', 'Type', 'id_type');
        $this->forge->addForeignKey('id_order', 'Order', 'id_order');
        $this->forge->createTable('OrderType');
    }

    public function down()
    {
        $this->forge->dropTable('OrderType');
    }
}
