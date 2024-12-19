<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMedia;
use CodeIgniter\HTTP\ResponseInterface;

class About extends BaseController
{
    public function index()
    {
        $modelMedia = new ModelMedia();
        $data = [
            'page' => 'About',
            'medias' => $modelMedia->findAll()
        ];
        return view('user/about',$data);
    }
}
