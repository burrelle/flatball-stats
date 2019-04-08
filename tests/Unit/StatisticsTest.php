<?php

namespace Tests\Unit;

use App\Statistics;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Player;
use App\Game;

class StatisticsTest extends TestCase
{
    use RefreshDatabase;

    /** @var Statistics */
    private $statistics;

    public function setUp(): void
    {
        parent::setUp();
        $this->statistics = factory(Statistics::class)->create();
    }

    /** @test */
    public function passerIsInstanceOfPlayer()
    {
        $this->assertInstanceOf(Player::class, $this->statistics->passer);
    }

    /** @test */
    public function recieverIsInstanceOfPlayer()
    {
        $this->assertInstanceOf(Player::class, $this->statistics->receiver);
    }

    /** @test */
    public function belongsToGame()
    {
        $this->assertInstanceOf(Game::class, $this->statistics->game);
    }
}
