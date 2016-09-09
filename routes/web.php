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

Route::get('/produtos/angular/listagem', ['as' => 'produtos.angular.listagem', 'middleware' => 'auth', 'uses' => 'ProdutosController@angular']);

Route::get('/produtos/carrinho', ['as' => 'produtos.carrinho', 'middleware' => 'auth', 'uses' => 'ProdutosController@carrinho']);

Route::get('/addcarrinho/{id}', ['as' => 'addcarrinho', 'middleware' => 'auth', 'uses' => 'ProdutosController@addCarrinho']);

Route::get('/produtos/checkout/{idEndereco}', ['as' => 'produtos.checkout', 'middleware' => 'auth', 'uses' => 'ProdutosController@checkout']);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/usuario/perfil/{id}', ['as' => 'usuario.perfil', 'middleware' => 'auth', 'uses' => 'HomeController@userPerfil']);

Route::get('/usuario/pedidos', ['as' => 'usuario.pedidos', 'middleware' => 'auth', 'uses' => 'HomeController@meusPedidos']);

Route::get('/usuario/pedido-detalhes/{idPedido}', ['as' => 'usuario.pedido.detalhes', 'middleware' => 'auth', 'uses' => 'HomeController@pedidoDetalhes']);

Route::get('/usuario/endereco-entrega', ['as' => 'usuario.endereco.entrega', 'middleware' => 'auth', 'uses' => 'HomeController@enderecoEntrega']);
