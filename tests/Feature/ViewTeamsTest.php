<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Team;
use App\Player;

class ViewTeamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canViewAllTeams()
    {
        $team = factory(Team::class)->create();
        $response = $this->get('/teams');
        $response->assertStatus(200);
        $response->assertSee($team->name);
        $response->assertSee($team->type);
    }

    /** @test */
    public function canViewSingleTeam()
    {
        $this->withoutExceptionHandling();
        $team = factory(Team::class)->create();
        $response = $this->get('/teams/' . $team->id);
        $response->assertStatus(200);
        $response->assertSee($team->name);
        $response->assertSee($team->type);
    }
}
