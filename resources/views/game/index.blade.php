@foreach($games as $game)
    {{ $game->opponent }}
    {{ $game->tournament }}
@endforeach
