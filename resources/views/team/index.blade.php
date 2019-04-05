@foreach($teams as $team)
<div>
    <form method="post" action="{{ route('teams.delete', $team->id) }}">
        @csrf
        <a href="{{ '/teams/' . $team->id }}">{{ $team->name }}</a> - {{ $team->type }} -
        <input type="hidden" name="_method" value="DELETE" />
        <button type="submit">delete</button>
    </form>
</div>
@endforeach
