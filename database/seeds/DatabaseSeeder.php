<?php

use App\Game;
use App\Team;
use App\User;
use App\Player;
use Illuminate\Database\Seeder;
use App\Statistics;

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
        $players = factory(Player::class, 14)->create([
            'team_id' => $team->id
        ]);
        $game = factory(Game::class, 5)->create([
            'team_id' => $team->id
        ]);
        factory(Statistics::class, 10)->create([
            'game_id' => $game->first()->id,
            'passer_id' => $players->random()->id,
            'receiver_id' => $players->random()->id,
            'catch' => 1,
        ]);
        factory(Statistics::class, 10)->create([
            'game_id' => $game->first()->id,
            'passer_id' => $players->random()->id,
            'receiver_id' => $players->random()->id,
            'goal' => 1,
        ]);
    }
}
