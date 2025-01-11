<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMedia;
use App\Models\ModelProject;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class Project extends BaseController
{
    public function index($page = 1)
    {
        $modelMedia = new ModelMedia();
        $modelUser = new ModelUser();
        $modelProject = new ModelProject();

        $data = [
            'page' => 'Project',
            'medias' => $modelMedia->findAll(),
            'projects' => $modelProject->paginate(4,'project'),
            'pager' => $modelProject->pager,
        ];

        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }

        return view('user/project', $data);
    }
}
