<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class About extends BaseController
{
    public function index()
    {
        $data['page'] = 'About';
        return view('user/about',$data);
    }
}
