<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelChat;
use App\Models\ModelMedia;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelType;
use App\Models\ModelOrder;
use App\Models\ModelOrderType;
use App\Models\ModelUser;

class Order extends BaseController
{
    protected $modelOrder;
    protected $modelUser;

    public function __construct()
    {
        $this->modelOrder = new ModelOrder();
        $this->modelUser = new ModelUser();
    }
    public function index()
    {
        $modelType = new ModelType();
        $modelMedia = new ModelMedia();
        $data = [
            'page' => 'Order',
            'location' => $this->website['location'],
            'types' => $modelType->findAll(),
            'medias' => $modelMedia->findAll(),
            'orders' => $this->modelOrder->select('order.*,status.status,GROUP_CONCAT(type.type ORDER BY type.type SEPARATOR ", ") AS types')->join('ordertype', 'order.id_order = ordertype.id_order', 'left')->join('type', 'ordertype.id_type = type.id_type', 'left')->join('status', 'id_status', 'id_status')->where('id_user', session()->get('user')['id'])->groupBy('order.id_order, order.title')->orderBy('order.id_order', 'DESC')->findAll()
        ];
        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $this->modelUser->find(session()->get('user')['id']);
        }
        return view('user/order', $data);
    }

    public function addOrder()
    {
        $modelOrderType = new ModelOrderType();

        $data = [
            'id_status' => 1,
            'id_user' => session()->get('user')['id'],
            'title' => htmlspecialchars($this->request->getVar('judul')),
            'description' => htmlspecialchars($this->request->getVar('description'))
        ];

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $types = $this->request->getVar('type');
        if (!isset($types)) {
            return redirect()->back()->withInput()->with('error', 'Select at least one type');
        }

        $order = $this->modelOrder->save($data);
        if (!$order) {
            return redirect()->back()->withInput()->with('errorarray', $this->modelOrder->errors());
        }

        foreach ($types as $type) {
            $modelOrderType->save([
                'id_type' => $type,
                'id_order' => $this->modelOrder->getInsertID()
            ]);
        }

        return redirect()->back()->with('success', 'The order has been shipped, wait for admin confirmation');
    }
    public function deleteOrder()
    {
        $id = htmlspecialchars($this->request->getVar('id'));
        $order = $this->modelOrder->find($id);
        if ($order['id_user'] != session()->get('user')['id'] || $order['id_status'] == 2) {
            return redirect()->back()->with('error', "You can't delete this order");
        }
        $this->modelOrder->delete($id);
        return redirect()->back()->with('success', 'The order was successfully canceled');
    }

    public function sendMessage()
    {
        $modelChat = new ModelChat();
        $modelOrder = new ModelOrder();

        $data = [
            'id_order' => htmlspecialchars($this->request->getVar('id_order')),
            'message' => htmlspecialchars($this->request->getVar('message')),
            'id_sender' => session()->get('user')['id'],
        ];

        $order = $modelOrder->find($data['id_order']);
        if (!$order) {
            return $this->response->setJSON([
                'status' => 404,
                'message' => 'Order not found'
            ]);
        }

        if ($order['id_user'] != session()->get('user')['id'] || $order['id_status'] != 2) {
            return $this->response->setJSON([
                'status' => 404,
                'message' => 'Cant send message to this order'
            ]);
        }

        $send = $modelChat->save($data);
        if (!$send) {
            return $this->response->setJSON([
                'status' => 400,
                'message' => $modelChat->errors()
            ]);
        }
        return $this->response->setJSON([
            'status' => 201,
            'message' => 'Success send message',
            'data' => $data
        ]);
    }
    public function getMessage($idOrder)
    {
        $modelChat = new ModelChat();
        $modelOrder = new ModelOrder();
        $order = $modelOrder->find($idOrder);
        if (!$order) {
            return $this->response->setJSON([
                'status' => 404,
                'message' => 'Order not found'
            ]);
        }
        if ($order['id_user'] != session()->get('user')['id'] || $order['id_status'] != 2) {
            return $this->response->setJSON([
                'status' => 404,
                'message' => 'Cant access message'
            ]);
        }
        $data = $modelChat->where('id_order', $idOrder)->orderBy('id_chat', 'DESC')->findAll();
        return $this->response->setJSON([
            'status' => 201,
            'message' => 'Success get message',
            'data' => $data
        ]);
    }
}
