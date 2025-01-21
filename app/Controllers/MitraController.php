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
    // Handle file upload for logo
    $photo = $this->request->getFile('logo');
    if ($photo->isValid() && !$photo->hasMoved()) {
        $result = cloudinaryUpload($photo->getRealPath());
        if(!isset($result)){
        return redirect()->back()->with('error', "can't upload photo");
        $data['logo'] = $result;
        }
    }

    $data = [
        'id_website' => $this->request->getPost('id_website'),
        'name' => $this->request->getPost('name'),
        'logo' => $result,
        'link' => $this->request->getPost('link'),
    ];

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
    // Handle file upload for logo
    $photo = $this->request->getFile('logo');
    if ($photo->isValid() && !$photo->hasMoved()) {
        $result = cloudinaryUpload($photo->getRealPath());
        if(!isset($result)){
        return redirect()->back()->with('error', "can't upload photo");
        $data['logo'] = $result;
        }
    }

    $data = [
        'id_website' => $this->request->getPost('id_website'),
        'name' => $this->request->getPost('name'),
        'logo' => $result,
        'link' => $this->request->getPost('link'),
    ];

    $this->modelMitra->update($id, $data);
    return redirect()->to('/admin/mitras')->with('success', 'Mitra updated successfully.');
}

    public function delete($id)
    {
        $this->modelMitra->delete($id);
        return redirect()->to('/admin/mitras')->with('success', 'Mitra deleted successfully.');
    }
}