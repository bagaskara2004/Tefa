<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function index()
    {
        $data['page'] = 'Order';
        $data['location'] = $this->website['location'];
        return view('user/order',$data);
    }
}
