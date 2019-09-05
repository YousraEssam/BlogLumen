<?php

/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->router->version();
});


$router->post('/auth/login', 'AuthController@postLogin');

$router->group(['middleware' => 'auth:api'], function($router)
{
    $router->get('/test', function(){
        return response()->json([
            'message' => 'Hello World!',
        ]);
    });
});

$router->group(['prefix' => 'api/authors'], function () use ($router) {
    $router->get('/', 'AuthorController@index');
    $router->post('/', [
        'middleware' => 'auth:api',
        'uses' => 'AuthorController@store'
        ]);
    $router->get('{author}', 'AuthorController@show');
    $router->put('{author}', 'AuthorController@update');
    $router->delete('{author}', 'AuthorController@softDelete');
});

$router->group(['prefix' => 'api/articles','middleware' => 'auth:api'], function () use ($router) {
    $router->get('/', 'ArticleController@index');
    $router->post('/', 'ArticleController@store');
    $router->get('{article}', 'ArticleController@show');
    $router->put('{article}', 'ArticleController@update');
    $router->delete('{article}', 'ArticleController@softDelete');
});

/*  -> register method to author   [IN AUTHCONTROLLER]
    -> check in update author method (only author can modify his details) [IN AUTHOR CONTROLLER]
    -> check in delete auhtor method (only autho can delete himself) [IN AUTHOR CONTROLLER]
    -> update last publish for every article add by the author
    -> [IN ARTICLE CONTROLLER]
    -> each author can retrive his own articles
    -> in create method add author id to author_id from current author
    -> in update method check if the current author is the owner
    -> in delete method check if the current author is the owner
*/