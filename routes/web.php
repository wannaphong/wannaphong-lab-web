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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'IncomeController@show')->name('home');

Route::post('/add', 'IncomeController@create')->name('add');

Route::get('/del/{id}', 'IncomeController@del_data')->name('del');


Route::get('/edit/{id}', 'IncomeController@view_edit')->name('view_edit');

Route::get('/update/{id}', 'IncomeController@update_data')->name('update');
