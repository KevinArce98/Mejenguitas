<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Mejenguitas\Match::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),
        'user_id' => 1,
        'players' => $faker->randomNumber(2),
        'price' => 	$faker->randomFloat(2, 500, 2000),
        'hour' => $faker->time(),
        'date' => $faker->date(),
        'site' => $faker->address,
        'lat' => $faker->randomFloat(5, -89, 100),
        'lng' => $faker->randomFloat(5, -26, 100),
        'info' => $faker-> text
    ];
});
