<?php

namespace Tests\Unit;

use App\Team;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TeamTest extends TestCase
{
    use DatabaseMigrations;

    /** @var Team */
    private $team;

    public function setUp(): void
    {
        parent::setUp();
        $this->team = factory(Team::class)->make();
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
}
