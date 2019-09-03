<?php

class ArticleTest extends TestCase
{
    /**
     * /api/articles [GET]
     */
    public function testShouldReturnAllArticles(){
        $this->get("api/articles", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' =>
                ['*' =>
                    [
                        'ID',
                        'Main title',
                        'Secondary Title',
                        'Content',
                        'Image',
                        'Author',
                    ]   
                ]       
        ]);
        
    }
    /**
     * /api/articles/id [GET]
     */
    public function testShouldReturnArticle(){
        $this->get("api/articles/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'ID',
                    'Main title',
                    'Secondary Title',
                    'Content',
                    'Image',
                    'Author',
                ]   
            
            ] 
        );
        
    }
    /**
     * /api/articles [POST]
     */
    public function testShouldCreateArticle(){
        $parameters = [
            'main_title' => 'create main title',
            'secondary_title' => 'create second title',
            'content' => 'create content',
            'image' => 'imagecreate.png',
            'author_id' => 1
        ];
        $this->post('api/articles', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'main_title',
                'secondary_title',
                'content',
                'image',
                'author_id',
            ] 
            // [
            //     'ID',
            //     'Main title',
            //     'Secondary Title',
            //     'Content',
            //     'Image',
            //     'Author',
            // ]    
        );
    }
    
    /**
     * /api/articles/id [PUT]
     */
    public function testShouldUpdateArticle(){
        $parameters = [
            'main_title' => 'update main title',
            'secondary_title' => 'update second title',
            'content' => 'update content',
            'image' => 'imageupdate.png',
            'author_id' => 2
        ];
        $this->put("api/articles/5", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'id',
                'main_title',
                'secondary_title',
                'content',
                'image',
                'author_id',
            ]   
            // [
            //     'Main title',
            //     'Secondary Title',
            //     'Content',
            //     'Image',
            //     'Author',
            // ] 
        );
    }
    /**
     * /api/articles/id [DELETE]
     */
    public function testShouldDeleteArticle(){
        
        $this->delete("api/articles/5", [], []);
        $this->seeStatusCode(202);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}
