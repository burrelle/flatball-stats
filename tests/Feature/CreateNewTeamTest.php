<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Team;

class CreateNewTeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function UserCanViewAddTeamForm()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/teams/new');
        $response->assertStatus(200);
    }

    /** @test */
    public function NotLoggedInUserIsRedirectedToLogin()
    {
        $response = $this->get('/teams/new');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function addingValidTeam()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/teams', [
            'name' => 'Revolver',
            'type' => 'open'
        ]);
        tap(Team::first(), function($team) use ($response){
            $response->assertStatus(302);
            $response->assertRedirect("/teams");
            $this->assertEquals('Revolver', $team->name);
            $this->assertEquals('open', $team->type);
        });
    }
}
