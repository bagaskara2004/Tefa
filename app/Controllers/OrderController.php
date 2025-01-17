<?php

namespace App\Controllers;

use App\Models\ModelOrder;
use App\Models\ModelOrderType;
use App\Models\ModelStatus;
use App\Models\ModelType; // Include the ModelType

class OrderController extends BaseController
{
    protected $modelOrder;
    protected $modelOrderType;
    protected $modelStatus;
    protected $modelType; // Add a property for ModelType

    public function __construct()
    {
        $this->modelOrder = new ModelOrder();
        $this->modelOrderType = new ModelOrderType();
        $this->modelStatus = new ModelStatus();
        $this->modelType = new ModelType(); // Initialize ModelType
    }

    public function index()
    {
        // Get the selected status from the query string
        $selectedStatus = $this->request->getGet('status');

        // Fetch orders with optional filtering by status
        $orders = $this->modelOrder->select('order.*, status.status')
            ->join('status', 'status.id_status = order.id_status', 'left')
            ->where('order.deleted', null); // Assuming soft delete
        if ($selectedStatus) {
            $orders->where('order.id_status', $selectedStatus);
        }
        $orders = $orders->findAll();

        // Fetch all statuses for the filter dropdown
        $statuses = $this->modelStatus->findAll();

        // Prepare an array to hold order type names
        $orderTypeNames = [];
        foreach ($orders as $order) {
            // Fetch the order type for this order
            $orderType = $this->modelOrderType->where('id_order', $order['id_order'])->first();
            if ($orderType) {
                // Fetch the type name using the id_type
                $type = $this->modelType->find($orderType['id_type']);
                if ($type) {
                    $orderTypeNames[$order['id_order']] = $type['type']; // Ensure 'type' exists
                } else {
                    $orderTypeNames[$order['id_order']] = 'N/A'; // Handle case where type is not found
                }
            } else {
                $orderTypeNames[$order['id_order']] = 'N/A'; // Handle case where order type is not found
            }
        }

        // Get the current time
        $time = date('Y-m-d H:i:s'); // You can format this as needed

        // Pass data to the view
        return view('admin/orders/index', [
            'orders' => $orders,
            'statuses' => $statuses,
            'selectedStatus' => $selectedStatus,
            'page' => 'Orders',
            'time' => $time,
            'orderTypeNames' => $orderTypeNames // Pass the order type names to the view
        ]);
    }

    public function edit($id)
    {
        // Fetch the order by ID
        $order = $this->modelOrder->find($id);
        if (!$order) {
            return redirect()->to('/admin/orders')->with('error', 'Order not found.');
        }

        // Fetch all statuses for the dropdown
        $statuses = $this->modelStatus->findAll();

        // Get the current time
        $time = date('Y-m-d H:i:s'); // You can format this as needed

        // Pass data to the view
        return view('admin/orders/edit', [
            'order' => $order,
            'statuses' => $statuses,
            'page' => 'Edit Order',
            'time' => $time // Pass the time variable to the view
        ]);
    }

    public function update($id)
    {
        // Validate input
        $validation = $this->validate([
            'title' => 'required|min_length[3]|max_length[25]',
            'description' => 'required|min_length[20]|max_length[1000]',
            'id_status' => 'required|integer'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Validation failed.');
        }

        // Update the order
        $this->modelOrder->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'id_status' => $this->request->getPost('id_status')
        ]);

        return redirect()->to('/admin/orders')->with('success', 'Order updated successfully.');
    }

    public function delete($id)
    {
        // Soft delete the order
        $this->modelOrder->delete($id);

        return redirect()->to('/admin/orders')->with('success', 'Order deleted successfully.');
    }
}