<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('team.index', compact('teams'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function show($team)
    {
        $team = Team::findOrFail($team);
        return view('team.show', [
            'fullTeam' => $team,
            'handlers' => $team->getHandlers(),
            'cutters' => $team->getCutters()
        ]);
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => ['required'],
            'type' => ['required'],
        ]);
        Auth::user()->teams()->create([
            'name' => request('name'),
            'type' => request('type')
        ]);
        return redirect()->route('teams.index');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if (Auth::user()->id === $team->id) {
            $team->delete();
            return redirect()->route('teams.index');
        }
    }
}
