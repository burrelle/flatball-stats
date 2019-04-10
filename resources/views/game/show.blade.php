@extends('layouts.app') @section('content')
<div class="flex items-center flex-col">
    <h2>
        {{ $game->team->name }} vs. {{ $game->opponent }} @
        {{ $game->tournament }}
    </h2>
    <h3>{{ $game->score }} - {{ $game->opponent_score }}</h3>
</div>

<table class="w-screen">
    <thead class="text-left">
        <tr>
            <th class="p-2">Name</th>
            <th class="p-2">Completions</th>
            <th class="p-2">Throwaways</th>
            <th class="p-2">Assists</th>
            <th class="p-2">Passing Percentage</th>
            <th class="p-2">Goals</th>
            <th class="p-2">Catches</th>
            <th class="p-2">Drops</th>
            <th class="p-2">Catching Percentage</th>
        </tr>
    </thead>
    <tbody>
        @foreach($game->team->players as $player)
        <tr>
            <td class="p-2">{{ $player->name }}</td>
            <td class="p-2">
                {{ $game->statistics()->completions($player->id) }}
            </td>
            <td class="p-2">
                {{ $game->statistics()->throwaways($player->id) }}
            </td>
            <td class="p-2">{{ $game->statistics()->assists($player->id) }}</td>
            <td class="p-2">
                {{ $game->statistics()->passingPercentage($player->id) }} %
            </td>
            <td class="p-2">
                {{ $game->statistics()->goals($player->id) }}
            </td>
            <td class="p-2">
                {{ $game->statistics()->catches($player->id) }}
            </td>
            <td class="p-2">
                {{ $game->statistics()->drops($player->id) }}
            </td>
            <td class="p-2">
                {{ $game->statistics()->catchingPercentage($player->id) }}%
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
