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
                'photo' => 'yzeenprdjyxhigjc5kwo'
            ],
            [
                'id_website' => 1,
                'name' => 'Maria Alexia',
                'degree' => 'Bachelor of Technology in Information Technology',
                'photo' => 'nnlkvfuroaqn7voyipw5'
            ],
            [
                'id_website' => 1,
                'name' => 'John Smith',
                'degree' => 'Bachelor of Science in Computer Science',
                'photo' => 'yreaycmadpv0fjzf2mem'
            ],
            [
                'id_website' => 1,
                'name' => 'Rudi Hantam',
                'degree' => 'Sarjana Komputer',
                'photo' => 'bgbj9ddohz1u4msuh5va'
            ],
        ];

        foreach ($data as $team) {
            $modelTeam->save($team);
        }
    }
}
