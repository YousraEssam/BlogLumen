<?php

use Illuminate\Http\UploadedFile;

class ArticleTest extends TestCase
{
    /**
     * /api/articles [GET]
     */
    public function testShouldReturnAllArticles(){
        $this->get("api/articles", []);
        $this->assertEquals(200,$this->response->status());        
    }
    /**
     * /api/articles/id [GET]
     */
    public function testShouldReturnArticle(){
        $this->get("api/articles/2", []);
        $this->assertEquals(200,$this->response->status());
    }
    /**
     * /api/articles [POST]
     */
    public function testShouldCreateArticle(){
        $parameters = factory('App\Article')->make()->toArray();
        $parameters['image'] = UploadedFile::fake()->image('yousra.jpg');
        $response = $this->post('api/articles', $parameters);
        $this->assertEquals(200,$this->response->status());  
    }
    
    /**
     * /api/articles/id [PUT]
     */
    public function testShouldUpdateArticle(){
        $parameters = factory('App\Article')->raw();
        $parameters['image'] = UploadedFile::fake()->image('yousra.jpg');
        $response = $this->put("api/articles/5", $parameters);
        $this->assertEquals(200,$this->response->status());  
    }
    /**
     * /api/articles/id [DELETE]
     */
    public function testShouldDeleteArticle(){
        $response = $this->delete("api/articles/3", [], []);
        $this->assertEquals(202,$this->response->status());
    }
}
