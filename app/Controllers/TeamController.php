<?php
namespace App\Controllers;

use App\Models\ModelTeam;

class TeamController extends BaseController
{
    protected $modelTeam;

    public function __construct()
    {
        $this->modelTeam = new ModelTeam();
    }

    // Display the list of teams
    public function index()
    {
        $data['teams'] = $this->modelTeam->findAll();
        $data['page'] = 'Teams';
        $data['time'] = $this->time;
        return view('admin/teams/index', $data);
    }

    // Show create team form
    public function create()
    {
        $data['page'] = 'Teams';
        $data['time'] = $this->time;
        return view('admin/teams/create', $data);
    }

    // Store new team
    public function store()
    {
        $photo = $this->request->getFile('photo');

        if ($photo->isValid() && !$photo->hasMoved()) {
            $result = cloudinaryUpload($photo->getRealPath());
            if(!isset($result)){
            return redirect()->back()->with('error', "can't upload photo");
            $data['photo'] = $result;
            }
        }

        $data = [
            'id_website' => 1,
            'name' => $this->request->getPost('name'),
            'photo' => $result,
            'degree' => $this->request->getPost('degree'),
        ];

        $this->modelTeam->save($data);
        return redirect()->to('/admin/teams')->with('success', 'Team created successfully.');
    }

    // Show edit team form
    public function edit($id)
    {
        $data['team'] = $this->modelTeam->find($id);
        $data['page'] = 'Teams';
        $data['time'] = $this->time;
        return view('admin/teams/edit', $data);
    }

    // Update team
    public function update($id)
{
    $photo = $this->request->getFile('photo');
    $data = [
        'id_website' => 1,
        'name' => $this->request->getPost('name'),
        'degree' => $this->request->getPost('degree'),
    ];

    // Check if a photo was uploaded
    if ($photo->isValid() && !$photo->hasMoved()) {
        $result = cloudinaryUpload($photo->getRealPath());
        if (!isset($result)) {
            return redirect()->back()->with('error', "Can't upload photo");
        }
        // Add the photo to the data array if upload was successful
        $data['photo'] = $result;
    }

    // Update the team information
    $this->modelTeam->update($id, $data);
    return redirect()->to('/admin/teams')->with('success', 'Team updated successfully.');
}

    // Delete team
    public function delete($id)
    {
        $this->modelTeam->delete($id);
        return redirect()->to('/admin/teams')->with('success', 'Team deleted successfully.');
    }
}