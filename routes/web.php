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
