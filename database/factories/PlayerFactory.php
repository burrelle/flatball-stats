<?php

use Faker\Generator as Faker;
use App\Player;
use App\Team;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'team_id' => function() {
            return factory(Team::class)->create()->id;
        },
        'name' => $faker->name(),
        'number' => $faker->numberBetween(0, 99),
        'position' => $faker->randomElement(['handler', 'cutter', 'any']),
        'gender' => $faker->randomElement(['male', 'female'])
    ];
});
