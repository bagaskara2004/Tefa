<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function index()
    {
        $data['page'] = 'Order';
        return view('user/order',$data);
    }
}
