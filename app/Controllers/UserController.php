<?php

namespace App\Controllers;

use App\Models\ModelUser ;

class UserController extends BaseController
{
    protected $modelUser ;

    public function __construct()
    {
        $this->modelUser  = new ModelUser ();
    }

    // Display the list of users
    public function index()
    {
        $users = $this->modelUser ->where('role', 0)->findAll();
        $data = [
            'users' => $users,
            'page' => 'Users', // Set the page variable
            'time' => date('Y-m-d H:i:s'), // Current time
        ];

        return view('admin/users/index', $data);
    }

    // Delete a user
    public function delete($id)
{
    // Check if the user exists before attempting to delete
    if ($this->modelUser ->find($id)) {
        $this->modelUser ->delete($id);
        return redirect()->to('/admin/users')->with('success', 'User  deleted successfully');
    } else {
        return redirect()->to('/admin/users')->with('error', 'User  not found');
    }
}
}