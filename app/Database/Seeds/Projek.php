<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Projek extends Seeder
{
    public function run()
    {
        $projekModel = new \App\Models\Projek();
        $data = [
            [
                "id_admin" => 1,
                "judul_projek" => 'Tefa',
                "deskripsi_projek" => 'Website untuk jula beli software',
                "foto_projek" => 'img',
            ],
            [
                "id_admin" => 1,
                "judul_projek" => 'Finding Nemu',
                "deskripsi_projek" => 'Website untuk Mencari barang hilang',
                "foto_projek" => 'img',
            ],
        ];

        foreach ($data as $projek) {
            $projekModel->save($projek);
        }
    }
}
