<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMedia;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelType;
use App\Models\ModelOrder;
use App\Models\ModelOrderType;
use App\Models\ModelUser;

class Order extends BaseController
{
    public function index()
    {
        $modelType = new ModelType();
        $modelMedia = new ModelMedia();
        $modelUser = new ModelUser();
        $data = [
            'page' => 'Order',
            'location' => $this->website['location'],
            'types' => $modelType->findAll(),
            'medias' => $modelMedia->findAll(),
        ];
        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }
        return view('user/order', $data);
    }

    public function addOrder()
    {
        $modelOrder = new ModelOrder();
        $modelOrderType = new ModelOrderType();

        $data = [
            'id_status' => 1,
            'id_user' => session()->get('user'),
            'title' => $this->request->getVar('judul'),
            'description' => $this->request->getVar('description')
        ];

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $order = $modelOrder->save($data);
        if (!$order) {
            return redirect()->back()->withInput()->with('errorarray', $modelOrder->errors());
        }

        $types = $this->request->getVar('type');
        foreach ($types as $type) {
            $modelOrderType->save([
                'id_type' => $type,
                'id_order' => $modelOrder->getInsertID()
            ]);
        }

        return redirect()->back()->with('success', 'The order has been shipped, wait for admin confirmation');
    }
}
