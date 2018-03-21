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


/* Dashboard */

/* Routes to user auth */
Route::get('/sistema/login', ['uses' => 'DashboardController@fazerLogin']);
Route::post('/sistema/login', ['as' => 'sistema.login', 'uses' => 'DashboardController@auth']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'DashboardController@logout']);

/* Group middleware logged */
Route::group(['middleware' => 'login'], function() {
    
    /* Route index dashborad */
    Route::get('/sistema', ['as' => 'sistema.index', 'uses' => 'DashboardController@index']);
    
    /* Route to export file in xls (Excel) */
    Route::get('sistema/user/export-xls', ['as' => 'sistema.user.export', 'uses' => 'UsersController@getUserXls']);
    
    /* Routes crud in the dashboard */
    Route::resource('sistema/user', 'UsersController');
    Route::resource('sistema/banner', 'BannersController');
    Route::resource('sistema/trabalho', 'TrabalhosController');
    Route::resource('sistema/portifolio', 'PortifoliosController');
    
    Route::get('sistema/categoria', ['as' => 'categoria.create', 'uses' => 'CategoriaPortifoliosController@create']);
});

/* Website */

/* Routes to home page */
Route::get('/', ['uses' => 'Controller@homepage']);
