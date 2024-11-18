<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pesanan' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type'           => 'INT',
            ],
            'id_status' => [
                'type'           => 'INT',
            ],
            'nama_pemesan' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'telp_pemesan' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'judul_pesanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'deskripsi_pesanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '1000',
            ],
            'otp_pesanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'tanggal_dibuat' => [
                'type'       => 'datetime',
                'null'       => True
            ],
            'tanggal_diubah' => [
                'type'       => 'datetime',
                'null'       => True
            ],
            'tanggal_dihapus' => [
                'type'       => 'datetime',
                'null'       => True
            ],
        ]);
        $this->forge->addKey('id_pesanan', true);
        $this->forge->addForeignKey('id_admin', 'Admin', 'id_admin');
        $this->forge->addForeignKey('id_status', 'Status', 'id_status');
        $this->forge->createTable('Pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('Pesanan');
    }
}
