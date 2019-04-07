@extends('layouts.app') @section('content')

<form action="/teams" method="post">
    @csrf
    <label>Name</label>
    <input type="text" name="name" />
    <label>Type</label>
    <select name="type">
        <option value="open">Open</option>
        <option value="women">Women</option>
        <option value="mixed">Mixed</option>
    </select>
    <button type="submit">Submit</button>
</form>
@endsection
