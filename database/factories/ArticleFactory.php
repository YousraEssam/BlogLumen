<?php

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Article::class, function (Faker $faker) {

    $author_ids = DB::table('authors')->select('id')->get();
    $author_id = $faker->randomElement($author_ids)->id;

    return [
        'main_title' => $faker->sentence(),
        'secondary_title' => $faker->sentence(),
        'content' => $faker->text(),
        'image' => $faker->image(),
        'author_id' => $author_id,
        // 'region_id' => Region::all()->random()->id,
        // 'author_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});