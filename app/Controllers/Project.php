<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Project extends BaseController
{
    public function index()
    {
        $data['page'] = 'Project';
        return view('user/project', $data);
    }
}
