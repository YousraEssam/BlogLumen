<?php

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Article::class, function (Faker $faker) {

    $author_ids = DB::table('authors')->select('id')->get();
    $author_id = $faker->randomElement($author_ids)->id;

    return [
        'main_title' => $faker->sentence($nbWords = 2),
        'secondary_title' => $faker->sentence($nbWords = 5),
        'content' => $faker->sentence($nbWords = 10),
        'image' => $faker->image,
        'author_id' => $author_id,
        // 'author_id' => Author::all()->random()->id,
        // 'author_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});