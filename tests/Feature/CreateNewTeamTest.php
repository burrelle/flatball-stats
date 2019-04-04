<?php

namespace Tests\Feature;

use App\Team;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateNewTeamTest extends TestCase
{
    use RefreshDatabase;

    private function validParams($overrides = [])
    {
        return array_merge([
            'name' => 'Revolver',
            'type' => 'open',
        ], $overrides);
    }

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
        tap(Team::first(), function ($team) use ($response) {
            $response->assertStatus(302);
            $response->assertRedirect("/teams");
            $this->assertEquals('Revolver', $team->name);
            $this->assertEquals('open', $team->type);
        });
    }

    public function testNameRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/teams', $this->validParams([
            'name' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('name');
        $this->assertEquals(0, Team::count());
    }

    public function testTypeRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/teams', $this->validParams([
            'type' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('type');
        $this->assertEquals(0, Team::count());
    }
}
