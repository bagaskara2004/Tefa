<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Team extends Seeder
{
    public function run()
    {
        $modelTeam = new \App\Models\ModelTeam();
        $data = [
            [
                'id_website' => 1,
                'name' => 'Andi Pratama',
                'degree' => 'Sarjana Komputer',
                'photo' => 'https://res.cloudinary.com/dnppmhczy/image/upload/v1734609574/yzeenprdjyxhigjc5kwo.jpg'
            ],
            [
                'id_website' => 1,
                'name' => 'Maria Alexia',
                'degree' => 'Bachelor of Technology in Information Technology',
                'photo' => 'https://res.cloudinary.com/dnppmhczy/image/upload/v1734609574/nnlkvfuroaqn7voyipw5.jpg'
            ],
            [
                'id_website' => 1,
                'name' => 'John Smith',
                'degree' => 'Bachelor of Science in Computer Science',
                'photo' => 'https://res.cloudinary.com/dnppmhczy/image/upload/v1734609573/yreaycmadpv0fjzf2mem.jpg'
            ],
            [
                'id_website' => 1,
                'name' => 'Rudi Hantam',
                'degree' => 'Sarjana Komputer',
                'photo' => 'https://res.cloudinary.com/dnppmhczy/image/upload/v1734609573/bgbj9ddohz1u4msuh5va.jpg'
            ],
        ];

        foreach ($data as $team) {
            $modelTeam->save($team);
        }
    }
}
