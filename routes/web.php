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
use Illuminate\Support\Facades\Auth;

//authで作られたコントローラー
Route::get('/', function () {
    return view('mypage');
});

Auth::routes();

Route::get('/mypage', 'TasksController@index')->name('mypage');
Route::get('/', 'TasksController@index')->name('index');
Route::get('/home', 'TasksController@index')->name('index');
Route::get('/index', 'TasksController@index')->name('index');


//ログイン必要
Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage', 'TasksController@mypage')->name('mypage');

    //ユーザー周り
    Route::get('/profile', 'TasksController@profile')->name('profile');
    Route::get('/edit-email', 'TasksController@editEmail')->name('edit-email');
    Route::post('/change-email', 'TasksController@changeEmail')->name('change-email');
    Route::get('/edit-pass', 'TasksController@editPass')->name('edit-pass');
    Route::post('/change-password', 'TasksController@changePassword')->name('change.password');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
   

    //tasks周り
    Route::post('/tasks', 'TasksController@new')->name('tasks.create');
    Route::get('/tasks/new', 'TasksController@new')->name('tasks.new');
    Route::post('/tasks/new', 'TasksController@create')->name('tasks.create');
    Route::get('/tasks/{id}/edit', 'TasksController@edit')->name('tasks.edit');
    Route::post('/tasks/{id}/update', 'TasksController@update')->name('tasks.update');
    Route::post('/tasks/{id}/delete', 'TasksController@delete')->name('tasks.delete');
    Route::get('/tasks/{id}/prepare', 'TasksController@prepare')->name('tasks.prepare');
    Route::post('/tasks/{id}/start', 'TasksController@start')->name('tasks.start');
    Route::get('/tasks/{id}/doing', 'TasksController@doing')->name('tasks.doing');
    Route::post('/tasks/{id}/finishFlg', 'TasksController@finishFlg')->name('tasks.finishFlg');
    Route::get('/tasks/{id}/complete', 'TasksController@complete')->name('tasks.complete');
    Route::get('/tasks/history', 'TasksController@history')->name('tasks.history');
});
