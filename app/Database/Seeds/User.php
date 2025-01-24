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
                'username' => 'admin',
                'password' => 'qwerty',
                'email' => 'admin@gmail.com',
                'telp' => '098374829999',
                'photo' => 'fpcdfnizngdcifp8isbm',
                'otp' => '123456',
                'actived' => true,
                'role' => 1
            ],
            [
                'username' => 'daus',
                'password' => 'qwerty',
                'email' => 'daus@gmail.com',
                'telp' => '098374829999',
                'photo' => 'fpcdfnizngdcifp8isbm',
                'otp' => '123456',
                'actived' => true,
                'role' => 0
            ],
            [
                'username' => 'roro',
                'password' => 'qwerty',
                'email' => 'roro@gmail.com',
                'telp' => '098374829999',
                'photo' => 'fpcdfnizngdcifp8isbm',
                'otp' => '123456',
                'actived' => true,
                'role' => 0
            ],
            [
                'username' => 'rizal',
                'password' => 'qwerty',
                'email' => 'rizal@gmail.com',
                'telp' => '098374829999',
                'photo' => 'fpcdfnizngdcifp8isbm',
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
