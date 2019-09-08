<?php

use Illuminate\Http\UploadedFile;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\WithoutMiddleware;

class ArticleTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;
    /**
     * /api/articles [GET]
     */
    public function testShouldReturnAllArticles(){
        // available articles
        factory('App\Author', 5)->create();
        factory('App\Article', 10)->create();
        
        // http request to get article
        // assert status code 200
        $this->get("api/articles")
             ->seeStatusCode(200);
    }
    /**
     * /api/articles/id [GET]
     */
    public function testShouldReturnArticle(){
        factory('App\Author')->create();
        $article = factory('App\Article')->create();
        $this
            ->get("api/articles/{$article->id}")
            ->seeStatusCode(200);
    }
    /**
     * /api/articles [POST]
     */
    public function testShouldCreateArticle(){
        factory('App\Author')->create();
        $parameters = factory('App\Article')->make()->toArray();
        $parameters['image'] = UploadedFile::fake()->image('yousra.jpg');
        $this->post('api/articles',$parameters)
             ->seeStatusCode(200)
             ->seeInDatabase('articles',[
                'main_title' => $parameters['main_title'],
                'author_id' => $parameters['author_id']
                ]);
    }  
    /**
     * /api/articles/id [PUT]
     */
    public function testShouldUpdateArticle(){
        factory('App\Author')->create();
        $parameters = factory('App\Article')->create()->toArray();
        $parameters['image'] = UploadedFile::fake()->image('yousra.jpg');
        $this->put("api/articles/{$parameters['id']}",$parameters)
             ->seeStatusCode(200)
             ->seeInDatabase('articles',[
                'main_title' => $parameters['main_title'],
                'author_id' => $parameters['author_id']
            ]);
    }
    /**
     * /api/articles/id [DELETE]
     */
    public function testShouldDeleteArticle(){
        factory('App\Author')->create();
        $article = factory('App\Article')->create();
        $this->delete("api/articles/{$article->id}")
             ->seeStatusCode(200)
             ->seeInDatabase('articles',[
                'main_title' => $article->main_title,
                'author_id' => $article->author_id
            ]);
    }
}
