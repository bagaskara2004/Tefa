<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Status extends Seeder
{
    public function run()
    {
        $statusModel = new \App\Models\Status();
        $data = [
            [
                "nama_status" => "Pending"
            ],
            [
                "nama_status" => "Processed"
            ],
            [
                "nama_status" => "Rejected"
            ],
            [
                "nama_status" => "Done"
            ],
        ];

        foreach ($data as $status) {
            $statusModel->save($status);
        }
    }
}
