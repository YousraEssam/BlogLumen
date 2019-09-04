<?php

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email,
        'github' => $faker->email,
        'twitter' => $faker->email,
        'location' => $faker->country
    ];
});