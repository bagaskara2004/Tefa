<?php

namespace App\Controllers;

use App\Models\ModelMedia;

class MediaController extends BaseController
{
    protected $modelMedia;

    public function __construct()
    {
        $this->modelMedia = new ModelMedia();
    }

    public function index()
    {
        $data['medias'] = $this->modelMedia->findAll();
        $data['page'] = 'Medias'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/medias/index', $data);
    }

    public function create()
    {
        $data['page'] = 'Medias'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/medias/create', $data);
    }

    public function store()
    {
        $data = [
            'id_website' => 1,
            'name' => $this->request->getPost('name'),
            'link' => $this->request->getPost('link'),
            'icon' => $this->request->getPost('icon'),
        ];

        $this->modelMedia->save($data);
        return redirect()->to('/admin/medias')->with('success', 'Media created successfully.');
    }

    public function edit($id)
    {
        $data['media'] = $this->modelMedia->find($id);
        $data['page'] = 'Medias'; // Set the active page for the sidebar
        $data['time'] = date('Y-m-d H:i:s'); // Set the current time
        return view('admin/medias/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_website' => 1,
            'name' => $this->request->getPost('name'),
            'link' => $this->request->getPost('link'),
            'icon' => $this->request->getPost('icon'),
        ];

        $this->modelMedia->update($id, $data);
        return redirect()->to('/admin/medias')->with('success', 'Media updated successfully.');
    }

    public function delete($id)
    {
        $this->modelMedia->delete($id);
        return redirect()->to('/admin/medias')->with('success', 'Media deleted successfully.');
    }
}