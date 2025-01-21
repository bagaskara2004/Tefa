<?php

namespace App\Controllers;

use App\Models\ModelFeedback;

class FeedbackController extends BaseController
{
    protected $modelFeedback;

    public function __construct()
    {
        $this->modelFeedback = new ModelFeedback();
    }

    // Display all feedbacks
    public function index()
    {
        $data['feedbacks'] = $this->modelFeedback->findAll();
        $data['page'] = 'Feedbacks';
        $data['time'] = $this->time;
        return view('admin/feedbacks/index', $data);
    }

    // Show create feedback form
    public function create()
    {
        $data['page'] = 'Create Feedback';
        $data['time'] = $this->time;
        return view('admin/feedbacks/create', $data);
    }

    // Store new feedback
    public function store()
    {
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'message' => $this->request->getPost('message'),
            'post' => $this->request->getPost('post') ? 1 : 0,
        ];

        $this->modelFeedback->save($data);
        return redirect()->to('/admin/feedbacks')->with('success', 'Feedback created successfully.');
    }

    // Show edit feedback form
    public function edit($id)
    {
        $data['feedback'] = $this->modelFeedback->find($id);
        $data['page'] = 'Edit Feedback';
        $data['time'] = $this->time;
        return view('admin/feedbacks/edit', $data);
    }

    // Update feedback
    public function update($id)
    {
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'message' => $this->request->getPost('message'),
            'post' => $this->request->getPost('post') ? 1 : 0,
        ];

        $this->modelFeedback->update($id, $data);
        return redirect()->to('/admin/feedbacks')->with('success', 'Feedback updated successfully.');
    }

    // Delete feedback
    public function delete($id)
    {
        $this->modelFeedback->delete($id);
        return redirect()->to('/admin/feedbacks')->with('success', 'Feedback deleted successfully.');
    }
}