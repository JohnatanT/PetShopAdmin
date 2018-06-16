<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Rotas do Site
Route::group([ 'namespace' => 'Site'],function (){
   Route::get('/','SiteController@index')->name('inicio');
   Route::get('loja','SiteController@loja')->name('loja');
   Route::get('loja/produtos','SiteController@produtos')->name('loja-produtos');
   Route::get('loja/produtos/{id}','SiteController@produto')->name('loja-produto');
   Route::post('loja/produtos/compra','SiteController@compra')->name('produto-compra');
   Route::get('loja/servicos','SiteController@servicos')->name('loja-servicos');
   Route::get('loja/servicos/{id}','SiteController@servico')->name('loja-servico');
   Route::post('loja/servicos/agendar','SiteController@agendar')->name('agendar');
   Route::get('loja/filhotes','SiteController@filhotes')->name('loja-filhotes');
   Route::get('loja/filhotes/{id}','SiteController@filhote')->name('loja-filhote');
   Route::get('loja/sobre','SiteController@sobre')->name('loja-sobre');
});



Auth::routes();

//Rotas do Painel de Administraçaõ

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => 'auth', 'namespace' => 'Admin'],function (){
    Route::get('produto/cadastro','Produto\ProdutoController@create')->name('produto-cad');
    Route::put('produto/update/{id}','Produto\ProdutoController@update')->name('produto-update');
    Route::get('produto/{id}/edit','Produto\ProdutoController@edit')->name('produto-edit');
    Route::get('produto/{id}/delete','Produto\ProdutoController@delete')->name('produto-delete');
    Route::get('produto','Produto\ProdutoController@index')->name('produto');
    Route::post('produto/store','Produto\ProdutoController@store')->name('produto-store');
    Route::get('servico/cadastro','Servico\ServicoController@create')->name('servico-cad');
    Route::get('servico','Servico\ServicoController@index')->name('servico');
    Route::post('servico/store','Servico\ServicoController@store')->name('servico-store');
    Route::put('servico/update/{id}','Servico\ServicoController@update')->name('servico-update');
    Route::get('servico/{id}/edit','Servico\ServicoController@edit')->name('servico-edit');
    Route::get('servico/{id}/delete','Servico\ServicoController@delete')->name('servico-delete');
    Route::get('animal','Animal\AnimalController@index')->name('animal');
    Route::get('animal/cadastro','Animal\AnimalController@create')->name('animal-create');
    Route::post('animal/store','Animal\AnimalController@store')->name('animal-store');
    Route::put('animal/update/{id}','Animal\AnimalController@update')->name('animal-update');
    Route::get('animal/{id}/edit','Animal\AnimalController@edit')->name('animal-edit');
    Route::get('animal/{id}/delete','Animal\AnimalController@delete')->name('animal-delete');
    Route::get('/','AdminController@index')->name('admin');
});


