<?php

namespace App\Http\Controllers;

use App\Team;

class TeamController extends Controller
{
    public function create()
    {
        return view('team.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => ['required'],
            'type' => ['required'],
        ]);
        Team::create([
            'name' => request('name'),
            'type' => request('type')
        ]);
        return redirect()->route('teams.index');
    }
}
