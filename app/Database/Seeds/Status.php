<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Status extends Seeder
{
    public function run()
    {
        $modelStatus = new \App\Models\ModelStatus();
        $data = [
            [
                "status" => "Pending"
            ],
            [
                "status" => "Processed"
            ],
            [
                "status" => "Rejected"
            ],
            [
                "status" => "Done"
            ],
        ];

        $modelStatus->insertBatch($data);
    }
}
