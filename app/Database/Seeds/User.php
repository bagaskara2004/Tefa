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
                'photo' => 'https://res.cloudinary.com/dnppmhczy/image/upload/v1734609574/olbulzmg4oazsfxqozls.jpg',
                'otp' => '123456',
                'actived' => true,
                'role' => 0
            ],
            [
                'username' => 'rara',
                'password' => 'qwerty',
                'email' => 'rara20041120@gmail.com',
                'photo' => 'https://res.cloudinary.com/dnppmhczy/image/upload/v1734609573/q4phdnmt9tdkgabeottm.jpg',
                'otp' => '123456',
                'actived' => true,
                'role' => 0
            ],
            [
                'username' => 'roko',
                'password' => 'qwerty',
                'email' => 'roko20041120@gmail.com',
                'photo' => 'https://res.cloudinary.com/dnppmhczy/image/upload/v1734609572/te5wi2etvgdnjmxsd556.jpg',
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
