<?php

namespace App\Controllers;

use App\Models\Pesanan;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ApiPesanan extends ResourceController
{
    protected $pesananModels;
    protected $encrypter;
    protected $format = 'json';

    public function __construct()
    {
        $this->pesananModels = new Pesanan();
        $this->encrypter = \Config\Services::encrypter();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $results = $this->pesananModels->findAll();
        $data = [];
        foreach ($results as $row) {
            $data[] = $this->decryptPesanan($row);
        }
        return $this->respond([
            'status' => 200,
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $results = $this->pesananModels->find($id);
        if (empty($results)) {
            return $this->failNotFound("id $id Not Found");
        }
        $data = $this->decryptPesanan($results);
        return $this->respond([
            'status' => 200,
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $this->pesananModels->save([
            'id_status' => $this->request->getVar('id_status'),
            'nama_pemesan' => $this->encrypter->encrypt($this->request->getVar('nama_pemesan')),
            'telp_pemesan' => $this->encrypter->encrypt($this->request->getVar('telp_pemesan')),
            'judul_pesanan' => $this->request->getVar('judul_pesanan'),
            'deskripsi_pesanan' => $this->request->getVar('deskripsi_pesanan'),
            'actived' => false,
            'otp_pesanan' => $this->encrypter->encrypt($this->createOtp()),
        ]);
        return $this->respondCreated([
            'message' => 'success'
        ]);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }

    private function createOtp()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $otp = '';

        for ($i = 0; $i < 6; $i++) {
            $otp .= $characters[rand(0, $charactersLength - 1)];
        }

        return $otp;
    }
    private function decryptPesanan($data)
    {
        $data['nama_pemesan'] = $this->encrypter->decrypt($data['nama_pemesan']);
        $data['telp_pemesan'] = $this->encrypter->decrypt($data['telp_pemesan']);
        $data['otp_pesanan'] = $this->encrypter->decrypt($data['otp_pesanan']);
        return $data;
    }
}
