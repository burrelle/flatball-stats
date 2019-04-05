<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<div id="app">
    <player-table
        :fullteam="{{ json_encode($fullTeam) }}"
        :handlers="{{ json_encode($handlers) }}"
        :cutters="{{ json_encode($cutters) }}"
    >
    </player-table>
</div>
