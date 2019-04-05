<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function create()
    {
        $teams = Auth::user()->teams;
        return view('player.create', compact('teams'));
    }

    public function store()
    {
        $this->validate(request(), [
            'team_id' => ['required'],
            'name' => ['required'],
            'number' => ['required', 'integer'],
            'position' => ['required'],
            'gender' => ['required']
        ]);
        Player::create([
            'team_id' => request('team_id'),
            'name' => request('name'),
            'number' => request('number'),
            'position' => request('position'),
            'gender' => request('gender')
        ]);
        return redirect()->route('teams.index');
    }

    public function index()
    {

    }
}
