<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<div id="app">
    @foreach($teams as $team)
    <team-item :team="{{ json_encode($team) }}">
        @auth @if(Auth::user()->id === $team->user_id)
        <delete-team-button :id="{{ $team->id }}"></delete-team-button>
        @endif @endauth
    </team-item>
    @endforeach
</div>
