<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMedia;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class Project extends BaseController
{
    public function index()
    {
        $modelMedia = new ModelMedia();
        $modelUser = new ModelUser();
        $data = [
            'page' => 'Project',
            'medias' => $modelMedia->findAll(),
        ];
        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }
        return view('user/project', $data);
    }
}
