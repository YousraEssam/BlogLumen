<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
            'id' => 1,
            'name' => 'author 1',
            'email' => 'author_1'.'@gmail.com',
            'github' => 'author 1 github',
            'twitter' => 'author 1 twitter',
            'location' => 'Alexandria',
            'latest_article_published' => 2
            ],
            [
            'id' => 2,
            'name' => 'author 2',
            'email' => 'author_2'.'@gmail.com',
            'github' => 'author 2 github',
            'twitter' => 'author 2 twitter',
            'location' => 'Cairo',
            'latest_article_published' => 4
            ],
            
        ]);
    }
}
