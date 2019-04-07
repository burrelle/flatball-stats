@extends('layouts.app') @section('content')
<table>
    <thead>
        <tr>
            <th>Tournament</th>
            <th>Team</th>
            <th></th>
            <th></th>
            <th>Opponent</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr class="hover:bg-blue-lightest cursor-pointer"
            onclick=window.location=`{{ "/games/" . $game->id }}`>
            <td class="p-2">{{ $game->tournament }}</td>
            <td class="p-2">{{ $game->team->name }}</td>
            <td class="p-2">{{ $game->score }}</td>
            <td class="p-2">{{ $game->opponent_score }}</td>
            <td class="p-2">{{ $game->opponent }}</td>
            <td class="p-2">
                {{ \Carbon\Carbon::parse($game->created_at)->diffForHumans() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
