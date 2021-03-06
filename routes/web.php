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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('tasks', 'TaskController@index');
Route::post('task', 'TaskController@store');
Route::post('task/{task}', 'TaskController@destroy');
Route::post('/completed-task/{task}', 'CompletedTaskController@store');
Route::delete('/completed-task/{task}', 'CompletedTaskController@destroy');

Route::get('admin/users', 'UsersController@index');
Route::post('admin/task', 'UsersController@store');
Route::delete('/admin/user/{user}', 'UsersController@destroy');