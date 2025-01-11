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
            'testimonials' => $modelUser->join('feedback','feedback.id_user = user.id_user')->where('post',true)->findAll(),
            'medias' => $modelMedia->findAll(),
            'mitras' => $modelMitra->findAll(),
        ];
        if (session('user') && session()->get('user')['role'] == 0) {
            $data['user'] = $modelUser->find(session()->get('user')['id']);
        }

        return view('user/index', $data);
    }
}
