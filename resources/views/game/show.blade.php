@extends('layouts.app') @section('content')
<div class="flex items-center flex-col">
    <h2>
        {{ $game->team->name }} vs. {{ $game->opponent }} @
        {{ $game->tournament }}
    </h2>
    <h3>{{ $game->score }} - {{ $game->opponent_score }}</h3>
</div>

@foreach($game->team->players as $player)
<p>{{ $player->name }}</p>

@endforeach @endsection


