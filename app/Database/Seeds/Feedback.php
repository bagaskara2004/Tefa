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
                'id_user' => 1,
                'message' => 'bagus banget dan cepet kerjanya',
                'post' => true
            ],
            [
                'id_user' => 2,
                'message' => 'lumayan untuk umkm harganya murah bangettt, kerja juga cepet pokoknya best deh',
                'post' => true
            ],
            [
                'id_user' => 3,
                'message' => 'njay kualitasnya bagus banget , desainnya mantull topp sih. rekomended banget website ini',
                'post' => true
            ],
        ];

        foreach ($data as $feedback) {
            $modelFeedback->save($feedback);
        }
    }
}
