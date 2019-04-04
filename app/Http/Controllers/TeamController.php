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
        Team::create([
            'name' => request('name'),
            'type' => request('type')
        ]);
        return redirect()->route('teams.index');
    }
}
