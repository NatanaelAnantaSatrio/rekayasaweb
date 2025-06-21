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
// Mahasiswa
$router->get('/mahasiswa', 'MahasiswaController@index');
$router->get('/mahasiswa/{id}', 'MahasiswaController@show');
$router->post('/mahasiswa', 'MahasiswaController@store');
$router->put('/mahasiswa/{id}', 'MahasiswaController@update');
$router->delete('/mahasiswa/{id}', 'MahasiswaController@destroy');

// Dosen
$router->get('/dosen', 'DosenController@index');
$router->get('/dosen/{id}', 'DosenController@show');
$router->post('/dosen', 'DosenController@store');
$router->put('/dosen/{id}', 'DosenController@update');
$router->delete('/dosen/{id}', 'DosenController@destroy');

// Matkul
$router->get('/matkul', 'MatkulController@index');
$router->get('/matkul/{id}', 'MatkulController@show');
$router->post('/matkul', 'MatkulController@store');
$router->put('/matkul/{id}', 'MatkulController@update');
$router->delete('/matkul/{id}', 'MatkulController@destroy');