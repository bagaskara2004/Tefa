<?php

namespace App\Controllers;

use App\Models\ModelWebsite;

class WebsiteController extends BaseController
{
    protected $modelWebsite;

    public function __construct()
    {
        $this->modelWebsite = new ModelWebsite();
    }

    public function index()
    {
        $data['websites'] = $this->modelWebsite->findAll();
        $data['page'] = 'Websites'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/websites/index', $data);
    }

    public function create()
    {
        $data['page'] = 'Websites'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/websites/create', $data);
    }

    public function store()
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'location' => $this->request->getPost('location'),
        ];

        $this->modelWebsite->save($data);
        return redirect()->to('/admin/websites')->with('success', 'Website created successfully.');
    }

    public function edit($id)
    {
        $data['website'] = $this->modelWebsite->find($id);
        $data['page'] = 'Websites'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/websites/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'location' => $this->request->getPost('location'),
        ];

        $this->modelWebsite->update($id, $data);
        return redirect()->to('/admin/websites')->with('success', 'Website updated successfully.');
    }

    public function delete($id)
    {
        $this->modelWebsite->delete($id);
        return redirect()->to('/admin/websites')->with('success', 'Website deleted successfully.');
    }
}