<?php

use Faker\Generator as Faker;
use App\Game;
use App\Team;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'team_id' => function() {
            return factory(Team::class)->create()->id;
        },
        'opponent' => $faker->word,
        'tournament' => $faker->word
    ];
});
