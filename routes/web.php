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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/users','UsersController',['except'=>['show']]);
    Route::resource('/inventories','InventoriesController');
    Route::resource('/supplies','SuppliesController',['except'=>['show']]);
    Route::resource('/vehicles','VehiclesController',['except'=>['show']]);

});

Route::resource('/inventories','InventoriesController');
