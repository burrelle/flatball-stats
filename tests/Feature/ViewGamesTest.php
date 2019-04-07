<?php

namespace Tests\Feature;

use App\Game;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewGamesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canViewAllGames()
    {
        $game = factory(Game::class)->create();
        $response = $this->get('/games');
        $response->assertStatus(200);
        $response->assertSee($game->opponent);
        $response->assertSee($game->tournament);
    }

    /** @test */
    public function canViewSingleGameLoggedIn()
    {
        $game = factory(Game::class)->create();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get("/games/{$game->id}");
        $response->assertStatus(200);
        $response->assertSee($game->opponent);
        $response->assertSee($game->tournament);
    }

    /** @test */
    public function canViewSingleGameNotLoggedIn()
    {
        $this->withoutExceptionHandling();
        $game = factory(Game::class)->create();
        $response = $this->get("/games/{$game->id}");
        $response->assertStatus(200);
        $response->assertSee($game->opponent);
        $response->assertSee($game->tournament);
    }
}
