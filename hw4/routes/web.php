<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BookController@index');
Route::get('/show-book/{book}', 'BookController@show');
Route::get('/book-book/{book}', 'BookController@book');
Route::get('/unbook-book/{book}', 'BookController@unbook');
Route::get('/create-book', 'BookController@create');
Route::post('/store-book', 'BookController@store');
Route::get('/edit-book/{book}', 'BookController@edit');
Route::post('/update-book', 'BookController@update');
Route::get('/delete-book/{book}', 'BookController@delete');

Route::get('/author', 'AuthorController@index');
Route::get('/author/create-author', 'AuthorController@create');
Route::post('/author/store-author', 'AuthorController@store');
Route::get('/author/edit-author/{author}', 'AuthorController@edit');
Route::post('/author/update-author', 'AuthorController@update');
Route::get('/author/delete-author/{author}', 'AuthorController@delete');

Route::get('/publisher', 'PublisherController@index');
Route::get('/publisher/create-publisher', 'PublisherController@create');
Route::post('/publisher/store-publisher', 'PublisherController@store');
Route::get('/publisher/edit-publisher/{publisher}', 'PublisherController@edit');
Route::post('/publisher/update-publisher', 'PublisherController@update');
Route::get('/publisher/delete-publisher/{publisher}', 'PublisherController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
