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

/**
 * PAGES ROUTES
 */
Route::get('/', 'PagesController@landing');

/**
 * AUTHENTICATION ROUTES
 */
Auth::routes();

/**
 * DASHBOARD ROUTES
 */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/album-do-mes', 'DashboardController@albumDoMes')->name('dashboard.album-do-mes');
Route::get('/dashboard/meus-pedidos', 'DashboardController@meusPedidos')->name('dashboard.meus-pedidos');
Route::get('/dashboard/dados-cadastrais', 'DashboardController@dadosCadastrais')->name('dashboard.dados-cadastrais');
Route::get('/dashboard/editar-dados-cadastrais', 'DashboardController@editarDadosCadastrais')->name('dashboard.editar-dados-cadastrais');


/**
 * USER ROUTES
 */
Route::namespace('Users')->group(function() {

    // Resource Routes
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create','UserController@create')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}/update', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

    // Profile Picture
    Route::post('user/ajax_remove_file', 'ProfilePictureController@removePicture');
    Route::post('user/ajax_resize_file', 'ProfilePictureController@resizePicture');
    Route::post('user/ajax_upload_file', 'ProfilePictureController@uploadPicture');

});


/**
 * ALBUM ROUTES
 */

Route::namespace('Albums')->group(function() {
    
    Route::resource('/albums', 'AlbumController');

    // Photo Management
    Route::post('albums/ajax_main_file', 'AlbumPhotosController@setAsMainFile');
    Route::post('albums/ajax_remove_file', 'AlbumPhotosController@removeFile');
    Route::post('albums/ajax_rename_file', 'AlbumPhotosController@renameFile');
    Route::post('albums/ajax_upload_file', 'AlbumPhotosController@uploadFile')->name('photos.upload');

});

use App\User;

//!!! TESTE
Route::get('/teste', function() {

    dd(date('n'));

});