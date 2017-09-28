<?php

Route::get('/painel/produtos/testes', 'Painel\ProdutoController@testes');
Route::resource('/painel/produtos', 'Painel\ProdutoController');
Route::get('/painel/produtos/create', 'Painel\ProdutoController@create');

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function(){
  Route::get('/usuarios', function(){
      return 'Cadastro de Usuários';
  });
  Route::get('/financeiro', function(){
      return 'Financeiro';
  });
  Route::get('/', function(){
      return 'Dashboard';
  });
});

Route::get('/categoria2/{idCat?}', function($idCat=null){
    return "Posts da categoria2 {$idCat}";
});

Route::get('/produto/categoria/filmes-lançamento', function(){
    return 'Filmes';
})->name('todos-os-filmes');

Route::group(['namespace' => 'Site'], function() {
  Route::get('/', 'SiteController@index');
  Route::get('/contato', 'SiteController@contato');
  Route::get('/categoria/{id?}', 'SiteController@categoria');
  Route::get('/error', 'SiteController@erro404');
});




Route::match(['get', 'post'], '/match', function (){
  return 'Rota do tipo Match';
});

Route::get('/empresa', function () {
    return view('empresa');
});

Route::get('/texto-exemplo', function () {
    return 'Texto Inicial';
});
