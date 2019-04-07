<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Team;
use App\Game;

class CreateNewGameTest extends TestCase
{
    use RefreshDatabase;

    private function validParams($overrides = [])
    {
        return array_merge([
            'team_id' => 1,
            'opponent' => 'Opponent',
            'tournament' => 'Tournament'
        ], $overrides);
    }

    /** @test */
    public function userCanViewNewGameForm()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/games/new');
        $response->assertStatus(200);
    }

    /** @test */
    public function notLoggedInUserIsRedirectedToLogin()
    {
        $response = $this->get('/games/new');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function addingValidGame()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $team = factory(Team::class)->create();
        $response = $this->actingAs($user)->post('/games', [
            'team_id' => $team->id,
            'opponent' => 'Opponent',
            'tournament' => 'Tournament'
        ]);
        tap(Game::first(), function ($game) use ($team, $response) {
            $response->assertStatus(302);
            $response->assertRedirect("/games/{$game->id}");
            $this->assertEquals($team->id, $game->team_id);
            $this->assertEquals('Opponent', $game->opponent);
            $this->assertEquals('Tournament', $game->tournament);
        });
    }

    public function testTeamIdIsRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/games', $this->validParams([
            'team_id' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('team_id');
        $this->assertEquals(0, Game::count());
    }

    public function testTeamIdIsInteger()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/games', $this->validParams([
            'team_id' => 'fish',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('team_id');
        $this->assertEquals(0, Game::count());
    }

    public function testOpponentIsRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/games', $this->validParams([
            'opponent' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('opponent');
        $this->assertEquals(0, Game::count());
    }

    public function testTournamentIsRequired()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/games', $this->validParams([
            'tournament' => '',
        ]));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('tournament');
        $this->assertEquals(0, Game::count());
    }
}
