<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Projek;

class Project extends BaseController
{
    public function index()
    {
        $projekModel = new Projek();
        $dataPerPage = 4;

        $data = [
            'projek' => $projekModel->paginate($dataPerPage),
            'pager'  => $projekModel->pager,
        ];
       
        return view('user/projects.php', $data);
    }
}
