<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Type extends Seeder
{
    public function run()
    {
        $modelType = new \App\Models\ModelType();
        $data = [
            [
                'type' => 'Website'
            ],
            [
                'type' => 'Mobile'
            ],
            [
                'type' => 'Desktop'
            ],
        ];

        $modelType->insertBatch($data);
    }
}
