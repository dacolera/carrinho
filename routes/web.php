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

Route::get('/produtos/listagem/{catId?}', ['as' => 'produtos.listagem', 'middleware' => 'auth', 'uses' => 'ProdutosController@index']);

Route::get('/produtos/carrinho', ['as' => 'produtos.carrinho', 'middleware' => 'auth', 'uses' => 'ProdutosController@carrinho']);

Auth::routes();

Route::get('/home', 'HomeController@index');
