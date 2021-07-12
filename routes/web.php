<?php

use App\Http\Controllers\TodoController;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/todos','TodoController@all');
$router->get('/todos/{id}','TodoController@show');
$router->post('/todos','TodoController@store');
$router->patch('/todos/{id}','TodoController@update');
$router->delete('/todos/{id}','TodoController@destroy');
