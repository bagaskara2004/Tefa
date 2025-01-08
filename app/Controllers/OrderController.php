<?php

namespace App\Controllers;

use App\Models\ModelOrder;
use App\Models\ModelOrderType;
use CodeIgniter\Database\Query;

class OrderController extends BaseController
{
    protected $modelOrder;
    protected $modelOrderType;

    public function __construct()
    {
        $this->modelOrder = new ModelOrder();
        $this->modelOrderType = new ModelOrderType();
    }

    public function index()
    {
        $statusFilter = $this->request->getGet('status'); // Get the status filter from the query string
        $orders = $this->modelOrder->where('deleted', null);
    
        if ($statusFilter) {
            $orders->where('id_status', $statusFilter);
        }
    
        // Set timezone and get current time
        date_default_timezone_set('Asia/Makassar');
        $currentTime = date('Y-m-d H:i:s');
    
        $data = [
            'orders' => $orders->findAll(),
            'statuses' => $this->getStatuses(), // Fetch statuses directly
            'page' => 'Orders', // Set the page variable
            'time' => $currentTime, // Pass the current time to the view
        ];
    
        return view('admin/orders/index', $data);
    }
    
    public function edit($id)
    {
        $order = $this->modelOrder->find($id);
        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Order not found');
        }
    
        if ($this->request->getMethod() === 'post') {
            $this->modelOrder->update($id, [
                'id_status' => $this->request->getPost('id_status'),
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
            ]);
            return redirect()->to('/admin/orders')->with('success', 'Order updated successfully');
        }
    
        // Set timezone and get current time
        date_default_timezone_set('Asia/Makassar');
        $currentTime = date('Y-m-d H:i:s');
    
        $data = [
            'order' => $order,
            'statuses' => $this->getStatuses(), // Fetch statuses directly
            'page' => 'Orders', // Set the page variable
            'time' => $currentTime, // Pass the current time to the view
        ];
    
        return view('admin/orders/edit', $data);
    }
    
    public function delete($id)
{
    // Check if the order exists before attempting to delete
    if ($this->modelOrder->find($id)) {
        $this->modelOrder->delete($id);
        return redirect()->to('/admin/orders')->with('success', 'Order deleted successfully');
    } else {
        return redirect()->to('/admin/orders')->with('error', 'Order not found');
    }
}

    private function getStatuses()
    {
        // Fetch statuses directly from the database
        $db = \Config\Database::connect();
        $builder = $db->table('status');
        return $builder->get()->getResultArray();
    }
}