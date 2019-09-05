<?php

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    $hasher = app()->make("hash");
    return [
        'name' => $faker->name(),
        'email' => $faker->email,
        'password' => $hasher->make('secret'),
        'github' => $faker->email,
        'twitter' => $faker->email,
        'location' => $faker->country
    ];
});