<?php

namespace App\Controllers;

use App\Models\ModelTeam;
use App\Models\ModelMedia;
use App\Models\ModelMitra;
use App\Models\ModelUser;
use Firebase\JWT\JWT;
use Config\JwtConfig;
use Firebase\JWT\Key;

class Home extends BaseController
{
    public function index()
    {
        $modelTeam = new ModelTeam();
        $modelUser = new ModelUser();
        $modelMedia = new ModelMedia();
        $modelMitra = new ModelMitra();

        $data = [
            'page' => 'Home',
            'teams' => $modelTeam->findAll(),
            'testimonials' => $modelUser->join('feedback', 'feedback.id_user = user.id_user')->where('post', true)->findAll(),
            'medias' => $modelMedia->findAll(),
            'mitras' => $modelMitra->findAll(),
        ];
        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }

        return view('user/index', $data);
    }

    public function editProfile()
    {
        $modelUser = new ModelUser();
        $file = $this->request->getFile('photo');

        $data = $modelUser->find(session()->get('user')['id']);
        $data['username'] = htmlspecialchars($this->request->getVar('username'));
        $data['telp'] = htmlspecialchars($this->request->getVar('telp'));
        $editUser = $modelUser->save($data);
        if (!$editUser) {
            return redirect()->back()->with('errorarray', $modelUser->errors());
        }
        if (!$file->isValid() && !$this->request->getVar('default')) {
            return redirect()->back()->with('success', "success edit profile");
        }

        if ($this->request->getVar('default')) {
            $data['photo'] = 'fpcdfnizngdcifp8isbm';
        } else {
            if ($file->isValid() && !$file->hasMoved()) {
                $ext = $file->getClientExtension();
                $valid = ['jpg', 'jpeg', 'png'];
                if (!in_array($ext, $valid)) {
                    return redirect()->back()->with('error', "can't upload photo");
                }
                $result = cloudinaryUpload($file->getRealPath());
                if(!isset($result)){
                    return redirect()->back()->with('error', "can't upload photo");
                }
                $data['photo'] = $result;
            } else {
                return redirect()->back()->with('error', "can't upload photo");
            }
        }
        $modelUser->save($data);
        return redirect()->back()->with('success', "success edit profile");
    }
}
