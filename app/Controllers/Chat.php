<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelChat;
use App\Models\ModelMedia;
use App\Models\ModelOrder;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class Chat extends BaseController
{
    public function index()
    {
        $modelOrder = new ModelOrder();
        $modelMedia = new ModelMedia();
        $modelUser = new ModelUser();
        $idOrder = $this->request->getVar('id');
        $data = [
            'page' => 'Order',
            'medias' => $modelMedia->findAll(),
            'order' =>$modelOrder->find($idOrder)
        ];
        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }
        return view('user/chat',$data);
    }
}
