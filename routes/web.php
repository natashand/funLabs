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

use App\Http\Controllers\NewUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/', 'NewUserController@index')->name('index');
Route::get('user/create', 'NewUserController@create')->name('create');
Route::post('user/store', 'NewUserController@store')->name('save');
Route::get('user/edit/{id}', 'NewUserController@edit')->name('edit');
Route::post('user/update/{id}', 'NewUserController@update')->name('update');
Route::get('user/delete/{id}', 'NewUserController@destroy')->name('delete');



