<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/produtos/listagem', ['as' => 'produtos.listagem', 'middleware' => 'auth', 'uses' => 'ProdutosController@index']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'UsuarioController@logout']);

Route::post('/auth/login', ['as' => 'auth.login', 'uses' => 'UsuarioController@login']);
