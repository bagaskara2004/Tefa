<?php

namespace App\Controllers;

use App\Models\ModelChat;
use App\Models\ModelOrder;
use App\Models\ModelOrderType;
use App\Models\ModelStatus;
use App\Models\ModelType; // Include the ModelType
use App\Models\ModelUser;
use Dompdf\Dompdf;
use Dompdf\Options;

class OrderController extends BaseController
{
    protected $modelOrder;
    protected $modelOrderType;
    protected $modelStatus;
    protected $modelUser;
    protected $modelType; // Add a property for ModelType

    public function __construct()
    {
        $this->modelOrder = new ModelOrder();
        $this->modelOrderType = new ModelOrderType();
        $this->modelStatus = new ModelStatus();
        $this->modelType = new ModelType(); // Initialize ModelType
        $this->modelUser = new ModelUser();
    }

    public function index()
    {
        // Get the selected status from the query string
        $selectedStatus = $this->request->getGet('status');

        // Fetch orders with optional filtering by status

        $orders = $this->modelOrder->select('order.*,status.status,GROUP_CONCAT(type.type ORDER BY type.type SEPARATOR ", ") AS types')->join('ordertype', 'order.id_order = ordertype.id_order', 'left')->join('type', 'ordertype.id_type = type.id_type', 'left')->join('status', 'id_status', 'id_status')->groupBy('order.id_order, order.title')->orderBy('order.id_order', 'DESC'); // Assuming soft delete
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
            'orderTypeNames' => $orderTypeNames, // Pass the order type names to the view
            'user' =>  $this->modelUser->find(session()->get('user')['id'])
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
            'types' => $this->modelType->findAll(), // Pass all types to the view
            'page' => 'Orders',
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

        $types = $this->request->getVar('type');
        if (!isset($types)) {
            return redirect()->back()->withInput()->with('error', 'Select at least one type');
        }

        // Update the order
        $this->modelOrder->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'id_status' => $this->request->getPost('id_status')
        ]);
        
        $this->modelOrderType->where('id_order', $id)->delete();
        foreach ($types as $type) {
            $this->modelOrderType->save([
                'id_type' => $type,
                'id_order' => $id
            ]);
        }

        return redirect()->to('/admin/orders')->with('success', 'Order updated successfully.');
    }

    public function delete($id)
    {
        // Soft delete the order
        $this->modelOrder->delete($id);

        return redirect()->to('/admin/orders')->with('success', 'Order deleted successfully.');
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
        if ($order['id_status'] != 2) {
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

        if ($order['id_status'] != 2) {
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

    public function downloadReport()
    {
        // Get the current date and calculate the current month
        $startDate = date('Y-m-01');
        $endDate = date('Y-m-t');

        // Fetch order counts
        $totalOrders = $this->modelOrder->where('created >=', $startDate)
            ->where('created <=', $endDate)
            ->countAllResults();

        $finishedOrders = $this->modelOrder->where('id_status', 3)
            ->where('created >=', $startDate)
            ->where('created <=', $endDate)
            ->countAllResults();

        $inProgressOrders = $this->modelOrder->where('id_status', 2)
            ->where('created >=', $startDate)
            ->where('created <=', $endDate)
            ->countAllResults();

        // Generate PDF
        $this->generatePDF($totalOrders, $finishedOrders, $inProgressOrders);
    }

    private function generatePDF($totalOrders, $finishedOrders, $inProgressOrders)
    {
        // Load Dompdf library
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);

        // Get the current month and year
        $currentMonth = date('F Y');

        $html = '
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #4CAF50; /* Green color */
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50; /* Green background for header */
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray for even rows */
        }
        tr:hover {
            background-color: #ddd; /* Highlight row on hover */
        }
    </style>
    <h1>Order Report for ' . $currentMonth . '</h1>
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Orders</td>
                <td>' . $totalOrders . '</td>
            </tr>
            <tr>
                <td>Finished Orders</td>
                <td>' . $finishedOrders . '</td>
            </tr>
            <tr>
                <td>In Progress Orders</td>
                <td>' . $inProgressOrders . '</td>
            </tr>
        </tbody>
    </table>';

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream('order_report.pdf', ['Attachment' => true]);
    }
}
