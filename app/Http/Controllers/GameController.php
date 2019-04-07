<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
    public function create()
    {
        return view('game.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'team_id' => ['required', 'integer'],
            'opponent' => ['required'],
            'tournament' => ['required']
        ]);
        $game = Game::create([
            'team_id' => request('team_id'),
            'opponent' => request('opponent'),
            'tournament' => request('tournament'),
        ]);
        return redirect("/games/{$game->id}");
    }

    public function show($game)
    {
        $game = Game::findOrFail($game);
        return view('game.show', compact('game'));
    }
}
