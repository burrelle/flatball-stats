<?php

use App\Game;
use App\Team;
use App\User;
use App\Player;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();
        $team = factory(Team::class)->create([
            'user_id' => $user->id
        ]);
        factory(Player::class, 14)->create([
            'team_id' => $team->id
        ]);
        factory(Game::class, 5)->create([
            'team_id' => $team->id
        ]);
    }
}
