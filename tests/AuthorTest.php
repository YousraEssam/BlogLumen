<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\WithoutMiddleware;

class AuthorTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;
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
        $parameters = factory('App\Author')->make();

        $this->post("api/authors",$parameters->makeVisible('password')->toArray())
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
             ->seeStatusCode(200);
    }
}
