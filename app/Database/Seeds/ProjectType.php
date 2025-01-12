<?php

namespace App\Database\Seeds;

use App\Models\ModelProjectType;
use CodeIgniter\Database\Seeder;

class ProjectType extends Seeder
{
    public function run()
    {
        $modelProjectType = new ModelProjectType();
        $projects = [
            1 => 2,  2 => 1,  3 => 3,  4 => 3,
            5 => 2,  6 => 2,  7 => 1,  8 => 3,
            9 => 3, 10 => 2, 11 => 2, 12 => 1,
           13 => 3, 14 => 3, 15 => 2, 16 => 2,
           17 => 1, 18 => 3, 19 => 3, 20 => 2,
        ];

        $data = [];
        foreach ($projects as $idProject => $typeCount) {
            for ($idType = 1; $idType <= $typeCount; $idType++) {
                $data[] = [
                    'id_type' => $idType,
                    'id_project' => $idProject,
                ];
            }
        }

        $modelProjectType->insertBatch($data);
    }
}
