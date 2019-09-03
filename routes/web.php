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

$router->group(['prefix' => 'api/authors'], function () use ($router) {
    $router->get('/', 'AuthorController@index');
    $router->post('/', 'AuthorController@store');
    $router->get('{author}', 'AuthorController@show');
    $router->put('{author}', 'AuthorController@update');
    $router->delete('{author}', 'AuthorController@destroy');
});

$router->group(['prefix' => 'api/articles'], function () use ($router) {
    $router->get('/', 'ArticleController@index');
    $router->post('/', 'ArticleController@store');
    $router->get('{article}', 'ArticleController@show');
    $router->put('{article}', 'ArticleController@update');
    $router->delete('{article}', 'ArticleController@destroy');
});