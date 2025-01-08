<?php

namespace App\Controllers;

use App\Models\ModelProject;

class ProjectController extends BaseController
{
    protected $projectModel;

    public function __construct()
    {
        $this->projectModel = new ModelProject();
    }

    public function index()
    {
        $data['projects'] = $this->projectModel->findAll();
        $data['page'] = 'Projects'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/projects/index', $data);
    }

    public function create()
    {
        $data['page'] = 'Projects'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/projects/create', $data);
    }

    public function store()
{
    // Handle file upload
    $photo = $this->request->getFile('photo');
    $photoName = '';

    if ($photo->isValid() && !$photo->hasMoved()) {
        $photoName = $photo->getRandomName(); // Generate a random name for the photo
        $photo->move(WRITEPATH . 'uploads', $photoName); // Move the file to the uploads directory
    }

    // Prepare data for saving
    $data = [
        'id_website' => 1, // Always set id_website to 1
        'title' => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'photo' => $photoName, // Save the photo name
        'url' => $this->request->getPost('url'),
    ];

    // Debugging: Check the data before saving
    log_message('debug', 'Data to save: ' . print_r($data, true));

    // Save data to the database
    if ($this->projectModel->save($data)) {
        return redirect()->to('/admin/projects')->with('success', 'Project created successfully.');
    } else {
        // Debugging: Log the errors if save fails
        log_message('error', 'Failed to save project: ' . print_r($this->projectModel->errors(), true));
        return redirect()->back()->with('error', 'Failed to create project.')->withInput();
    }
}

    public function edit($id)
    {
        $data['project'] = $this->projectModel->find($id);
        $data['page'] = 'Projects'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/projects/edit', $data);
    }

    public function update($id)
{
    // Handle file upload
    $photo = $this->request->getFile('photo');
    $photoName = '';

    if ($photo->isValid() && !$photo->hasMoved()) {
        $photoName = $photo->getRandomName(); // Generate a random name for the photo
        $photo->move(WRITEPATH . 'uploads', $photoName); // Move the file to the uploads directory
    }

    // Prepare data for updating
    $data = [
        'id_website' => 1, // Always set id_website to 1
        'title' => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'url' => $this->request->getPost('url'),
    ];

    if ($photoName) {
        $data['photo'] = $photoName; // Update the photo name only if a new photo was uploaded
    }

    // Debugging: Check the data before updating
    log_message('debug', 'Data to update: ' . print_r($data, true));

    // Update data in the database
    if ($this->projectModel->update($id, $data)) {
        return redirect()->to('/admin/projects')->with('success', 'Project updated successfully.');
    } else {
        // Debugging: Log the errors if update fails
        log_message('error', 'Failed to update project: ' . print_r($this->projectModel->errors(), true));
        return redirect()->back()->with('error', 'Failed to update project.')->withInput();
    }
}

    public function delete($id)
    {
        $this->projectModel->delete($id);
        return redirect()->to('/admin/projects')->with('success', 'Project deleted successfully.');
    }
}