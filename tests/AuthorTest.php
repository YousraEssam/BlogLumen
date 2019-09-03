<?php

class AuthorTest extends TestCase
{
    /**
     * /api/authors [GET]
     */
    public function testShouldReturnAllAuthors(){
        $this->get("api/authors", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' =>
                ['*' =>
                    [
                        'ID',
                        'Name',
                        'Email Address',
                        'GitHub Account',
                        'Twitter Account',
                        'Location',
                    ]   
                ]       
        ]);
        
    }
    /**
     * /api/authors/id [GET]
     */
    public function testShouldReturnAuthor(){
        $this->get("api/authors/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'ID',
                    'Name',
                    'Email Address',
                    'GitHub Account',
                    'Twitter Account',
                    'Location',
                ]   
            
            ] 
        );
        
    }
    /**
     * /api/authors [POST]
     */
    public function testShouldCreateAuthor(){
        $parameters = [
            'name' => 'create Name',
            'email' => 'createemail@gmail.com',
            'Github' => 'create Github Account',
            'twitter' => 'create Twitter Account.png',
            'location' => 'Alexandria',
            'latest_article_published' => 4,
        ];
        $this->post('api/authors', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'email',
                'Github',
                'twitter',
                'location',
            ] 
            // [
            //     'ID',
            //     'Name',
            //     'Email Address',
            //     'Github Account',
            //     'Twitter Account',
            //     'Location',
            // ]    
        );
    }
    
    /**
     * /api/authors/id [PUT]
     */
    public function testShouldUpdateAuthor(){
        $parameters = [
            'name' => 'update Name',
            'email' => 'updateemail@gmail.com',
            'Github' => 'update Github Account',
            'twitter' => 'update Twitter.png',
            'location' => 'Cairo',
            'latest_article_published' => 4,
        ];
        $this->put("api/authors/3", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'name',
                'email',
                'Github',
                'twitter',
                'location',
            ]   
            // [
            //     'ID',
            //     'Name',
            //     'Email Address',
            //     'Github Account',
            //     'Twitter Account',
            //     'Location',
            // ] 
        );
    }
    /**
     * /api/authors/id [DELETE]
     */
    public function testShouldDeleteAuthor(){
        
        $this->delete("api/authors/3", [], []);
        $this->seeStatusCode(202);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}
