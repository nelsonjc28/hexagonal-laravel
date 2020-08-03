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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/listar', 'UserController@listar')->name('user.listar');
Route::post('/user/create', 'UserController@store')->name('user.create');
Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::delete('/user/destroy', 'UserController@destroy')->name('user.destroy');
