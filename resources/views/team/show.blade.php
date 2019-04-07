@extends('layouts.app') @section('content')
<player-table
    :fullteam="{{ json_encode($fullTeam) }}"
    :handlers="{{ json_encode($handlers) }}"
    :cutters="{{ json_encode($cutters) }}"
>
</player-table>
<h2 class="mt-4">Recent Games</h2>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Opponent</th>
            <th>Tournament</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fullTeam->games as $game)
        <tr class="hover:bg-blue-lightest cursor-pointer"
            onclick=window.location=`{{ "/games/" . $game->id }}`>
            <td class="p-1">
                {{ \Carbon\Carbon::parse($game->created_at)->format('d/m/Y')}}
            </td>
            <td class="p-1">{{ $fullTeam->name }}</td>
            <td class="p-1">{{ $game->score }}</td>
            <td>-</td>
            <td class="p-1">{{ $game->opponent_score }}</td>
            <td class="p-1">{{ $game->opponent }}</td>
            <td class="p-1">{{ $game->tournament }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
