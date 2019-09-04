<?php

class AuthorTest extends TestCase
{
    /**
     * /api/authors [GET]
     */
    public function testShouldReturnAllAuthors(){
        $response = $this->get("api/authors", []);
        $this->assertEquals(200,$this->response->status());        
    }
    /**
     * /api/authors/id [GET]
     */
    public function testShouldReturnAuthor(){
        $this->get("api/authors/2", []);
        $this->assertEquals(200,$this->response->status());        
    }
    /**
     * /api/authors [POST]
     */
    public function testShouldCreateAuthor(){
        $parameters = factory('App\Author')->make()->toArray();
        $response = $this->post('api/authors', $parameters, []);
        $this->assertEquals(200,$this->response->status());        
    }
    
    /**
     * /api/authors/id [PUT]
     */
    public function testShouldUpdateAuthor(){
        $parameters = factory('App\Author')->make()->toArray();
        $response = $this->put('api/authors/5', $parameters, []);
        $this->assertEquals(200,$this->response->status()); 
    }
    /**
     * /api/authors/id [DELETE]
     */
    public function testShouldDeleteAuthor(){
        
        $response = $this->delete("api/authors/3", [], []);
        $this->assertEquals(202,$this->response->status());
    }
}
