<?php

use App\Game;
use App\Player;
use App\Statistics;
use Faker\Generator as Faker;

$factory->define(Statistics::class, function (Faker $faker) {
    return [
        'game_id' => function() {
            return factory(Game::class)->create()->id;
        },
        'passer_id' => function () {
            return factory(Player::class)->create()->id;
        },
        'receiver_id' => function () {
            return factory(Player::class)->create()->id;
        },
        'catch' => 0,
        'drop' => 0,
        'goal' => 0,
        'throwaway' => 0,
    ];
});
