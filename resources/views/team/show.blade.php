{{ $team->name }}
{{ $team->type }}
@foreach($team->players as $player)
    <p>{{ $player->name }} - {{ $player->number }} - {{ $player->gender }} - {{ $player->position }}</p>
@endforeach
