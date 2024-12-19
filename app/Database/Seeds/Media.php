<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ModelMedia;

class Media extends Seeder
{
    public function run()
    {
        $modelMedia = new ModelMedia();
        $data = [
            [
                'id_website' => 1,
                'name' => 'instagram',
                'link' => 'https://x.com/',
                'icon' => 'bi-twitter-x'
            ],
            [
                'id_website' => 1,
                'name' => 'facebook',
                'link' => 'https://facebook.com/',
                'icon' => 'bi-facebook'
            ],
            [
                'id_website' => 1,
                'name' => 'instagram',
                'link' => 'https://instagram.com/',
                'icon' => 'bi-instagram'
            ],
            
        ];

        $modelMedia->insertBatch($data);
    }
}
