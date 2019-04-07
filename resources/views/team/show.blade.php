@extends('layouts.app')
@section('content')
<player-table
    :fullteam="{{ json_encode($fullTeam) }}"
    :handlers="{{ json_encode($handlers) }}"
    :cutters="{{ json_encode($cutters) }}"
>
</player-table>
@endsection
