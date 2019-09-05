<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class AuthorTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * /api/authors [GET]
     */
    public function testShouldReturnAllAuthors(){
        factory('App\Author',5)->create();   
        $this->get("api/authors")
             ->seeStatusCode(200);    
    }
    /**
     * /api/authors/id [GET]
     */
    public function testShouldReturnAuthor(){
        $author = factory('App\Author')->create(); 
        $this->get("api/authors/{$author->id}")
             ->seeStatusCode(200);      
    }
    /**
     * /api/authors [POST]
     */
    public function testShouldCreateAuthor(){
        $parameters = factory('App\Author')->make()->toArray(); 
        $this->post("api/authors",$parameters)
             ->seeStatusCode(200)
             ->seeInDatabase('authors',[
                 'name' => $parameters['name'],
                 'email' => $parameters['email']
             ]);     
    }
    
    /**
     * /api/authors/id [PUT]
     */
    public function testShouldUpdateAuthor(){
        $parameters = factory('App\Author')->create()->toArray();
        // $response = $this->put('api/authors/5', $parameters, []);
        // $this->assertEquals(200,$this->response->status()); 
        $this->put("api/authors/{$parameters['id']}",$parameters)
             ->seeStatusCode(200)
             ->seeInDatabase('authors',[
                 'name' => $parameters['name'],
                 'email' => $parameters['email']
             ]);
    }
    /**
     * /api/authors/id [DELETE]
     */
    public function testShouldDeleteAuthor(){
        $author = factory('App\Author')->create();
        $this->delete("api/authors/{$author->id}")
             ->seeStatusCode(200)
             ->seeInDatabase('authors',[
                 'name' => $author['name'],
                 'email' => $author['email']
             ]);
    }
}
