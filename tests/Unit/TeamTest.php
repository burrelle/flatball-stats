<?php

namespace Tests\Unit;

use App\Team;
use App\User;
use App\Player;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /** @var Team */
    private $team;

    /** @var Player[] */
    private $handlers;

    /** @var Player[] */
    private $cutters;

    public function setUp(): void
    {
        parent::setUp();
        $this->team = factory(Team::class)->make();
        $this->handlers = factory(Player::class, 4)->make([
            'team_id' => $this->team->id,
            'position' => 'handler'
        ]);
        $this->cutters = factory(Player::class, 3)->make([
            'team_id' => $this->team->id,
            'position' => 'cutter'
        ]);
    }

    /** @test */
    public function teamHasUser()
    {
        $this->assertInstanceOf(User::class, $this->team->user);
    }

    /** @test */
    public function teamHasManyPlayers()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->team->players);
    }

    /** @test */
    public function getHandlersReturnsHandlers()
    {
        $this->assertCount(4, $this->handlers);
    }

    /** @test */
    public function getHandlersReturnsCutters()
    {
        $this->assertCount(3, $this->cutters);
    }

    /** @test */
    public function teamHasManyGames()
    {
        $this->assertInstanceOf(Collection::class, $this->team->games);
    }
}
