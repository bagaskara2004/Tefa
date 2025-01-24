<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ModelFeedback;

class Feedback extends Seeder
{
    public function run()
    {
        $modelFeedback = new ModelFeedback();
        $data = [
            [
                'id_user' => 3,
                'message' => 'bagus banget dan cepet kerjanya',
                'post' => true
            ],
            [
                'id_user' => 4,
                'message' => 'lumayan untuk umkm harganya murah bangettt, kerja juga cepet pokoknya best deh',
                'post' => true
            ],
        ];

        foreach ($data as $feedback) {
            $modelFeedback->save($feedback);
        }
    }
}
