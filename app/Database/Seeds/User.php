<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ModelUser;
class User extends Seeder
{
    public function run()
    {
        $modelUser = new ModelUser();
        $data = [
            [
                'username' => 'bagastmpvan',
                'password' => 'qwerty',
                'email' => 'testing20041120@gmail.com',
                'photo' => 'olbulzmg4oazsfxqozls',
                'otp' => '123456',
                'actived' => true,
                'role' => 0
            ],
            [
                'username' => 'rara',
                'password' => 'qwerty',
                'email' => 'rara20041120@gmail.com',
                'photo' => 'q4phdnmt9tdkgabeottm',
                'otp' => '123456',
                'actived' => true,
                'role' => 0
            ],
            [
                'username' => 'roko',
                'password' => 'qwerty',
                'email' => 'roko20041120@gmail.com',
                'photo' => 'te5wi2etvgdnjmxsd556',
                'otp' => '123456',
                'actived' => true,
                'role' => 0
            ],
        ];

        foreach ($data as $user) {
            $modelUser->save($user);
        }
    }
}
