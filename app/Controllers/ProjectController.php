<?php

namespace App\Controllers;

use App\Models\ModelProject;
use App\Models\ModelProjectType;
use App\Models\ModelType;

class ProjectController extends BaseController
{
    protected $projectModel;
    protected $typeModel;
    protected $projecttypeModel;

    public function __construct()
    {
        $this->projectModel = new ModelProject();
        $this->typeModel = new ModelType();
        $this->projecttypeModel = new ModelProjectType();
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
        $data['types'] = $this->typeModel->findAll();
        return view('admin/projects/create', $data);
    }

    public function store()
    {
        // Handle file upload
        $photo = $this->request->getFile('photo');

        if ($photo->isValid() && !$photo->hasMoved()) {
            $result = cloudinaryUpload($photo->getRealPath());
            if (!isset($result)) {
                return redirect()->back()->with('error', "can't upload photo");
                $data['photo'] = $result;
            }
        }

        // Prepare data for saving
        $data = [
            'id_website' => 1,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'photo' => $result, // Save the photo name
            'url' => $this->request->getPost('url'),
        ];

        $types = $this->request->getVar('type');
        if (!isset($types)) {
            return redirect()->back()->withInput()->with('error', 'Select at least one type');
        }

        // Debugging: Check the data before saving
        log_message('debug', 'Data to save: ' . print_r($data, true));

        // Save data to the database
        if ($this->projectModel->save($data)) {
            foreach ($types as $type) {
                $this->projecttypeModel->save([
                    'id_type' => $type,
                    'id_project' => $this->projectModel->getInsertID()
                ]);
            }
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
        $data['types'] = $this->typeModel->findAll();
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        $projektTypes = $this->projecttypeModel->where('id_project', $id)->findAll();
        $data['selectedTypes'] = array_column($projektTypes, 'id_type');
        return view('admin/projects/edit', $data);
    }

    public function update($id)
    {
        // Prepare data for updating
        $data = [
            'id_website' => 1,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'url' => $this->request->getPost('url'),
        ];
        $types = $this->request->getVar('type');
        if (!isset($types)) {
            return redirect()->back()->withInput()->with('error', 'Select at least one type');
        }

        // Handle file upload
        $photo = $this->request->getFile('photo');

        if ($photo->isValid() && !$photo->hasMoved()) {
            $result = cloudinaryUpload($photo->getRealPath());
            if (!isset($result)) {
                return redirect()->back()->with('error', "can't upload photo");
            }
            $data['photo'] = $result; // Update the photo name only if a new photo was uploaded
        }

        // Debugging: Check the data before updating
        log_message('debug', 'Data to update: ' . print_r($data, true));

        // Update data in the database
        if ($this->projectModel->update($id, $data)) {
            $this->projecttypeModel->where('id_project', $id)->delete();
            foreach ($types as $type) {
                $this->projecttypeModel->save([
                    'id_type' => $type,
                    'id_project' => $id
                ]);
            }
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
