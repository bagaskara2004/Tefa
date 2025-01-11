<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFeedback;
use App\Models\ModelMedia;
use App\Models\ModelType;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class Contact extends BaseController
{
    public function index()
    {
        $modelMedia = new ModelMedia();
        $modelUser = new ModelUser();
        $data = [
            'page' => 'Contact',
            'medias' => $modelMedia->findAll(),
            'location' => $this->website['location'],
        ];
        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }
        return view('user/contact', $data);
    }
    public function feedback() {
        $modelFeedback = new ModelFeedback();
        $data = [
            'id_user' => session()->get('user')['id'],
            'message' => $this->request->getVar('message'),
            'post' => false
        ];

        $remoteIp = $this->request->getIPAddress();
        $response = $this->request->getVar('g-recaptcha-response');
        if (!verifyCaptcha($remoteIp, $response)) {
            return redirect()->back()->withInput()->with('error', 'Recaptcha is not valid');
        }

        $feedback = $modelFeedback->save($data);
        if (!$feedback) {
            return redirect()->back()->withInput()->with('errorarray', $modelFeedback->errors());
        }

        return redirect()->back()->with('success', 'Thank you for your feedback we have received. We really appreciate your time and input to help us get better');
    }
}
