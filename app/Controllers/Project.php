<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMedia;
use App\Models\ModelProject;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class Project extends BaseController
{
    public function index()
    {
        $modelMedia = new ModelMedia();
        $modelUser = new ModelUser();
        $modelProject = new ModelProject();

        $data = [
            'page' => 'Project',
            'medias' => $modelMedia->findAll(),
            'projects' => $modelProject->select('project.*, GROUP_CONCAT(type.type ORDER BY type.type ASC SEPARATOR ", ") as types')->join('projecttype', 'project.id_project = projecttype.id_project', 'left')->join('type', 'projecttype.id_type = type.id_type', 'left')->groupBy('project.id_project')->paginate(4,'project'),
            'pager' => $modelProject->pager,
        ];

        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }

        return view('user/project', $data);
    }
}
