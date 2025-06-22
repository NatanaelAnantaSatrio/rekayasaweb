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

$router->post('/api/login', 'AuthController@login');
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/api/user-profile', function () {
        return response()->json(auth()->user());
    });
});

$router->group(['middleware' => 'auth:api'], function () use ($router) {
    // Dosen
    $router->get('/api/dosen', 'DosenController@index');
    $router->post('/api/dosen', 'DosenController@store');
    $router->get('/api/dosen/{id}', 'DosenController@show');
    $router->put('/api/dosen/{id}', 'DosenController@update');
    $router->delete('/api/dosen/{id}', 'DosenController@destroy');

    // Mahasiswa
    $router->get('/api/mahasiswa', 'MahasiswaController@index');
    $router->post('/api/mahasiswa', 'MahasiswaController@store');
    $router->get('/api/mahasiswa/{id}', 'MahasiswaController@show');
    $router->put('/api/mahasiswa/{id}', 'MahasiswaController@update');
    $router->delete('/api/mahasiswa/{id}', 'MahasiswaController@destroy');

    // Matkul
    $router->get('/api/matkul', 'MatkulController@index');
    $router->post('/api/matkul', 'MatkulController@store');
    $router->get('/api/matkul/{id}', 'MatkulController@show');
    $router->put('/api/matkul/{id}', 'MatkulController@update');
    $router->delete('/api/matkul/{id}', 'MatkulController@destroy');
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

$router->group(['middleware' => 'jwt.auth'], function () use ($router) {
    $router->get('/user', function () {
        // Misal: ambil data user yang sedang login
        return auth()->user();
    });
});