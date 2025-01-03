<?php

namespace App\Database\Seeds;

use App\Models\ModelMitra;
use CodeIgniter\Database\Seeder;

class Mitra extends Seeder
{
    public function run()
    {
        $modelMitra = new ModelMitra();
        $data = [
            [
                'id_website' => 1,
                'name' => 'instacart',
                'logo' => 'djuy7bhf5b625m2lmupu',
                'link' => 'https://instacart.com/'
            ],
            [
                'id_website' => 1,
                'name' => 'kickstarter',
                'logo' => 'fptfq7xobxh920x68vfd',
                'link' => 'https://kickstarter.com/'
            ],
            [
                'id_website' => 1,
                'name' => 'lyft',
                'logo' => 'twn3y6zoea18nixetp8k',
                'link' => 'https://lyft.com/'
            ],
            [
                'id_website' => 1,
                'name' => 'pinterest',
                'logo' => 'q9d8d8vsxmla358h73qz',
                'link' => 'https://pinterest.com/'
            ],
            [
                'id_website' => 1,
                'name' => 'shopify',
                'logo' => 'csv354ngd5wuk9cibdz5',
                'link' => 'https://shopify.com/'
            ],
            [
                'id_website' => 1,
                'name' => 'twitter',
                'logo' => 'bsmgylt6ifoodealjvog',
                'link' => 'https://twitter.com/'
            ],
            
        ];

        $modelMitra->insertBatch($data);
    }
}
