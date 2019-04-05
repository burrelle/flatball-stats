<?php

namespace Tests\Unit;

use App\Player;
use Tests\TestCase;
use App\Team;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PlayerTest extends TestCase
{
    use DatabaseMigrations;

    /** @var Player */
    private $player;

    public function setUp(): void
    {
        parent::setUp();
        $this->player = factory(Player::class)->make();
    }

    /** @test */
    public function playerBelongsToTeam()
    {
        $this->assertInstanceOf(Team::class, $this->player->team);
    }
}
