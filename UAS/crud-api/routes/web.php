<?php

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
$router->get('/mahasiswas', 'MahasiswaController@index');
$router->get('/mahasiswas/{id}', 'MahasiswaController@show');
$router->post('/mahasiswas', 'MahasiswaController@store');
$router->put('/mahasiswas/{id}', 'MahasiswaController@update');
$router->delete('/mahasiswas/{id}', 'MahasiswaController@destroy');

$router->get('/dosens', 'DosenController@index');
$router->get('/dosens/{id}', 'DosenController@show');
$router->post('/dosens', 'DosenController@store');
$router->put('/dosens/{id}', 'DosenController@update');
$router->delete('/dosens/{id}', 'DosenController@destroy');

$router->get('/matkuls', 'MatkulController@index');
$router->get('/matkuls/{id}', 'MatkulController@show');
$router->post('/matkuls', 'MatkulController@store');
$router->put('/matkuls/{id}', 'MatkulController@update');
$router->delete('/matkuls/{id}', 'MatkulController@destroy');

$router->get('/users', 'UserController@index');
$router->get('/users/{id}', 'UserController@show');