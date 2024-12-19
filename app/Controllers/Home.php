<?php

namespace App\Controllers;
use App\Models\ModelTeam;
use App\Models\ModelMedia;
use App\Models\ModelUser;

class Home extends BaseController
{
    public function index()
    {
        $modelTeam = new ModelTeam();
        $modelUser = new ModelUser();
        $modelMedia = new ModelMedia();

        $data = [
            'page' => 'Home',
            'teams' => $modelTeam->findAll(),
            'testimonials' => $modelUser->join('feedback','feedback.id_user = user.id_user')->findAll(),
            'medias' => $modelMedia->findAll()
        ];

        return view('user/index', $data);
    }
}
