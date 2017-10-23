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

Route::get('/doc', 'DocController@index')->middleware('auth');
Route::get('/doc/{id}', 'DocController@show')->middleware('auth');

Route::resource('page', 'PageController')->middleware('auth');
Route::resource('page.comment', 'CommentController')->middleware('auth');
Route::resource('page.tag', 'TagController');
Route::get('/tag/{tag}', 'TagController@show')->name('tag.show');


Route::get('/type/{type}', 'TypeController')->name('type')->middleware('auth');

Route::get('/export', 'ExportController')->name('export')->middleware('auth');

Route::view('/passport', 'passport.index')->name('passport.index');
