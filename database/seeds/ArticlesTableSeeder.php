<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
            'main_title' => 'main title 1',
            'secondary_title' => 'secondary title 1',
            'content' => 'blablabla 11',
            'image' => 'image1.png',
            'author_id' => 1,
            ],
            [
            'main_title' => 'main title 2',
            'secondary_title' => 'secondary title 2',
            'content' => 'blablabla 22',
            'image' => 'image2.png',
            'author_id' => 2,
            ],
            [
            'main_title' => 'main title 3',
            'secondary_title' => 'secondary title 3',
            'content' => 'blablabla 33',
            'image' => 'image3.png',
            'author_id' => 1,
            ],
            [
            'main_title' => 'main title 4',
            'secondary_title' => 'secondary title 4',
            'content' => 'blablabla 44',
            'image' => 'image4.png',
            'author_id' => 2,
            ],
        ]);
    }
}
