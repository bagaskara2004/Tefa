<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Website extends Seeder
{
    public function run()
    {
        $modelWebsite = new \App\Models\ModelWebsite();
        $data = [
            [
                'email' => 'testing20041120@gmail.com',
                'location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d985.7154086506637!2d115.1628662!3d-8.7990675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sid!2sid!4v1727521330800!5m2!1sid!2sid'
            ]
        ];

        foreach ($data as $website) {
            $modelWebsite->save($website);
        }
    }
}
