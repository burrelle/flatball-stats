@extends('layouts.app')
@section('content')
@foreach($teams as $team)
<team-item :team="{{ json_encode($team) }}">
    @auth @if(Auth::user()->id === $team->user_id)
    <delete-team-button :id="{{ $team->id }}"></delete-team-button>
    @endif @endauth
</team-item>
@endforeach
@endsection
