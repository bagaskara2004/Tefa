<?php

namespace App\Controllers;

use App\Models\ModelMitra;

class MitraController extends BaseController
{
    protected $modelMitra;

    public function __construct()
    {
        $this->modelMitra = new ModelMitra();
    }

    public function index()
    {
        $data['mitras'] = $this->modelMitra->findAll();
        $data['page'] = 'Mitra'; // Set the active page for the sidebar
        $data['time'] = $this->time;
        return view('admin/mitras/index', $data);
    }

    public function create()
    {
        $data['page'] = 'Mitra'; // Set the active page for the sidebar
        $data['time'] = $this->time;
        return view('admin/mitras/create', $data);
    }

    public function store()
{
    $data = [
        'id_website' => $this->request->getPost('id_website'),
        'name' => $this->request->getPost('name'),
        'link' => $this->request->getPost('link'),
    ];

    // Handle file upload for logo
    $logo = $this->request->getFile('logo');
    if ($logo->isValid() && !$logo->hasMoved()) {
        $logoName = $logo->getRandomName(); // Generate a random name for the logo
        $logo->move(FCPATH . 'uploads', $logoName); // Move the file to the uploads directory
        $data['logo'] = $logoName; // Save the logo name
    }

    $this->modelMitra->save($data);
    return redirect()->to('/admin/mitras')->with('success', 'Mitra created successfully.');
}
    public function edit($id)
    {
        $data['mitra'] = $this->modelMitra->find($id);
        $data['page'] = 'Mitra'; // Set the active page for the sidebar
        $data['time'] = $this->time;
        return view('admin/mitras/edit', $data);
    }

    public function update($id)
{
    $data = [
        'id_website' => $this->request->getPost('id_website'),
        'name' => $this->request->getPost('name'),
        'link' => $this->request->getPost('link'),
    ];

    // Handle file upload for logo
    $logo = $this->request->getFile('logo');
    if ($logo->isValid() && !$logo->hasMoved()) {
        $logoName = $logo->getRandomName(); // Generate a random name for the logo
        $logo->move(FCPATH . 'uploads', $logoName); // Move the file to the uploads directory
        $data['logo'] = $logoName; // Update the logo name only if a new logo was uploaded
    }

    $this->modelMitra->update($id, $data);
    return redirect()->to('/admin/mitras')->with('success', 'Mitra updated successfully.');
}

    public function delete($id)
    {
        $this->modelMitra->delete($id);
        return redirect()->to('/admin/mitras')->with('success', 'Mitra deleted successfully.');
    }
}