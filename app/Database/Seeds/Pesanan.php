<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pesanan extends Seeder
{
    public function run()
    {
        $pesananModel = new \App\Models\Pesanan();
        $encrypter = \Config\Services::encrypter();
        $data = [
            [
                "id_status" => 1,
                "nama_pemesan" => $encrypter->encrypt('kafir'),
                "telp_pemesan" => $encrypter->encrypt('08900099998'),
                "judul_pesanan" => 'Youtube',
                "deskripsi_pesanan" => 'website media sosial',
                "actived" => true,
                "otp_pesanan" => $encrypter->encrypt('06d78c'),
            ],
            [
                "id_status" => 2,
                "nama_pemesan" => $encrypter->encrypt('rosi'),
                "telp_pemesan" => $encrypter->encrypt('08904229998'),
                "judul_pesanan" => 'Race',
                "deskripsi_pesanan" => 'website berita moto racing',
                "actived" => true,
                "otp_pesanan" => $encrypter->encrypt('78g22h'),
            ],
            [
                "id_status" => 3,
                "nama_pemesan" => $encrypter->encrypt('dombel'),
                "telp_pemesan" => $encrypter->encrypt('08598629998'),
                "judul_pesanan" => 'Obit',
                "deskripsi_pesanan" => 'aplication hack nasa',
                "actived" => true,
                "otp_pesanan" => $encrypter->encrypt('54ss6i'),
            ],
            [
                "id_status" => 4,
                "nama_pemesan" => $encrypter->encrypt('wayan'),
                "telp_pemesan" => $encrypter->encrypt('082734957348'),
                "judul_pesanan" => 'E-learning',
                "deskripsi_pesanan" => 'aplication dan web pembelajaran',
                "actived" => true,
                "otp_pesanan" => $encrypter->encrypt('98i223'),
            ],
        ];

        foreach ($data as $pesanan) {
            $pesananModel->save($pesanan);
        }
    }
}
