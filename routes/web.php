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


//authで作られたコントローラー
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/mypage', 'HomeController@index')->name('mypage');
Route::get('/', 'HomeController@index')->name('mypage');

//ログイン必要
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/edit-email', 'HomeController@editEmail')->name('edit-email');
Route::get('/edit-pass', 'HomeController@editPass')->name('edit-pass');
Route::get('/tasks/new', 'TasksController@new')->name('tasks.new');
Route::post('/tasks', 'TasksController@new')->name('tasks.create');
Route::get('/tasks/history', 'TasksController@history')->name('tasks.history');
