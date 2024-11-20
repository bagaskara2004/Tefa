<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Fitur extends Seeder
{
    public function run()
    {
        $fiturModel = new \App\Models\Fitur();
        $data = [
            [
                "id_admin" => 1,
                "dashboard" => true,
                "pesanan" => true,
                "projek" => true,
                "admin" => true,
            ],
        ];

        foreach ($data as $fitur) {
            $fiturModel->save($fitur);
        }
    }
}
