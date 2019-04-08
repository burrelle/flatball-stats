<?php

namespace Tests\Unit;

use App\Game;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Team;
use Illuminate\Support\Collection as IlluminateCollection;
use Illuminate\Database\Eloquent\Collection;

class GameTest extends TestCase
{
    use RefreshDatabase;

    /** @var Game */
    private $game;

    public function setUp(): void
    {
        parent::setUp();
        $this->game = factory(Game::class)->make();
    }

    /** @test */
    public function gameBelongsToTeam()
    {
        $this->assertInstanceOf(Team::class, $this->game->team);
    }

    /** @test */
    public function gameHasManyStatistics()
    {
        $this->assertInstanceOf(Collection::class, $this->game->statistics);
    }
}
