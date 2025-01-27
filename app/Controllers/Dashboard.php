<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelOrder;
use App\Models\ModelProject;
use App\Models\ModelUser ;
use App\Models\ModelStatus;

class Dashboard extends BaseController
{
    protected $modelOrder;
    protected $modelProject;
    protected $modelUser ;
    protected $modelStatus;

    public function __construct()
    {
        $this->modelOrder = new ModelOrder();
        $this->modelProject = new ModelProject();
        $this->modelUser   = new ModelUser ();
        $this->modelStatus = new ModelStatus();
    }

    public function index()
    {
        // Get the current month and year
        $currentMonth = date('Y-m');
        
        // Count the number of orders based on their status for the current month
        $totalOrders = $this->modelOrder->where('created >=', $currentMonth . '-01')
                                         ->where('created <=', $currentMonth . '-31')
                                         ->countAllResults();
        
        $finishedOrders = $this->modelOrder->where('id_status', 4) // Assuming 3 is the status for finished
                                            ->where('created >=', $currentMonth . '-01')
                                            ->where('created <=', $currentMonth . '-31')
                                            ->countAllResults();
        
        $rejectedOrders = $this->modelOrder->where('id_status', 3) // Assuming 2 is the status for rejected
                                            ->where('created >=', $currentMonth . '-01')
                                            ->where('created <=', $currentMonth . '-31')
                                            ->countAllResults();

        // Count the number of users created this month
        $newUsers = $this->modelUser ->where('created >=', $currentMonth . '-01')
                                     ->where('created <=', $currentMonth . '-31')
                                     ->where('role =',0)
                                     ->countAllResults();

        // Count the number of projects created this month
        $newProjects = $this->modelProject->where('created >=', $currentMonth . '-01')
                                          ->where('created <=', $currentMonth . '-31')
                                          ->countAllResults();

        // Fetch the 5 most recent orders
        $recentOrders = $this->modelOrder->orderBy('created', 'DESC') // Order by creation date
                                          ->findAll(5); // Get the 5 most recent orders

        // Fetch the 5 most recent projects
        $recentProjects = $this->modelProject->orderBy('created', 'DESC') // Order by creation date
                                              ->findAll(5); // Get the 5 most recent projects

        $data = [
            'page' => 'Dashboard',
            'time' => date('Y-m-d H:i:s'),
            'totalOrders' => $totalOrders,
            'finishedOrders' => $finishedOrders,
            'rejectedOrders' => $rejectedOrders,
            'newUsers' => $newUsers,
            'newProjects' => $newProjects,
            'recentOrders' => $recentOrders, // Add recent orders to the data
            'recentProjects' => $recentProjects, // Add recent projects to the data
        ];

        return view('admin/dashboard', $data);
    }
}