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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/createthread', function () {
    return view('createthread');
});
Route::post('/newthread', 'ThreadsController@create');
Route::post('/newpost', 'ThreadController@new');

Route::get('/', 'ThreadsController@index');
Route::get('/threads/{threadid}', 'ThreadController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
