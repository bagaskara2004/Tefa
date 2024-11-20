<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $adminModel = new \App\Models\Admin();
        $encrypter = \Config\Services::encrypter();
        $data = [
            [
                "nama_admin" => $encrypter->encrypt("Master"),
                "password_admin" => $encrypter->encrypt("adminmaster"),
            ]
        ];

        foreach ($data as $admin) {
            $adminModel->save($admin);
        }
    }
}
