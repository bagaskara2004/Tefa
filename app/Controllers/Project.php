<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMedia;
use CodeIgniter\HTTP\ResponseInterface;

class Project extends BaseController
{
    public function index()
    {
        $modelMedia = new ModelMedia();
        $data = [
            'page' => 'Project',
            'medias' => $modelMedia->findAll()
        ];
        return view('user/project', $data);
    }
}
