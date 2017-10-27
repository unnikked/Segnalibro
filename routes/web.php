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

Route::get('/docs', 'DocController@index')->middleware('auth');
Route::get('/docs/{id}', 'DocController@show')->middleware('auth');

Route::resource('page', 'PageController')->middleware('auth');
Route::resource('page.comment', 'CommentController')->middleware('auth');
Route::get('/comments', 'CommentController@index')->middleware('auth');
Route::post('/comments/search', 'CommentSearchController')->middleware('auth')->name('comment.search');
Route::resource('page.tag', 'TagController');
Route::get('/tag/{tag}', 'TagController@show')->name('tag.show');

Route::post('/page/search', 'PageSearchController')->name('page.search');

Route::get('/export', 'ExportController')->name('export')->middleware('auth');

Route::view('/passport', 'passport.index')->name('passport.index');
