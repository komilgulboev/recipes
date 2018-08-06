<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    $res['success'] = true;
    $res['result'] = 'Recipes catalog API';
    return response($res);
});
 
$app->post('/login', 'LoginController@index');
$app->post('/register', 'UserController@register');
$app->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);

$app->get('/recipes', 'RecipesController@index');
$app->get('/recipes/{id}', 'RecipesController@read');
$app->get('/recipes/delete/{id}', 'RecipesController@delete');
$app->post('/recipes/create', 'RecipesController@create');
$app->post('/recipes/update/{id}', 'RecipesController@update');