<?php

use App\Team;
use App\User;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'type' => $faker->randomElement(['open', 'women', 'mixed'])
    ];
});
