<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['page'] = 'Dashboard';
        $data['time'] = $this->time;
        return view('admin/dashboard',$data);
    }
}
