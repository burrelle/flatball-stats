<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Team;

class RemoveTeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function LoggedInUserCannotDeleteTeamTheyDidNotCreated()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->delete('/teams/' . 0);
        $response->assertStatus(404);
    }

    /** @test */
    public function NotLoggedInUserCannotDeleteTeam()
    {
        $team = factory(Team::class)->create();
        $response = $this->delete('/teams' . $team->id);
        $response->assertStatus(404);
    }
}
