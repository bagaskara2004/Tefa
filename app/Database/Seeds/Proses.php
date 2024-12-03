<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Proses extends Seeder
{
    public function run()
    {
        $prosesModel = new \App\Models\Proses();
        $data = [
            [
                "id_admin" => 1,
                "id_pesanan" => 1,
            ],
            [
                "id_admin" => 1,
                "id_pesanan" => 2,
            ],
        ];

        foreach ($data as $proses) {
            $prosesModel->save($proses);
        }
    }
}
