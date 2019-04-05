<form action="/players" method="post">
    @csrf
    <label>Name</label>
    <input type="text" name="name" />
    <label>Number</label>
    <input type="number" name="number" />
    <label>Position</label>
    <select name="position">
        <option value="cutter">Cutter</option>
        <option value="handler">Handler</option>
        <option value="any">Any</option>
    </select>
    <label>Gender</label>
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <label>Team</label>
    <select name="team_id">
        @foreach($teams as $team)
        <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>
