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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    //author
    Route::get('/authors', 'AuthorController@index')->name('admin.authors');
    Route::get('/author/create', 'AuthorController@create')->name('admin.author.create');
    Route::post('/author/create', 'AuthorController@store');
    Route::get('/author/edit/{id}', 'AuthorController@edit')->name('admin.author.edit');
    Route::post('/author/edit/{id}', 'AuthorController@update');
    Route::get('/author/delete/{id}', 'AuthorController@destroy')->name('admin.author.delete');

    //book
    Route::get('/book/create', 'BookController@create');
    Route::post('/book/create', 'BookController@store');
    Route::get('/book/edit/{id}', 'BookController@edit');
    Route::post('/book/edit/{id}', 'BookController@update');
    Route::get('/book/delete/{id}', 'BookController@destroy');
});

Route::get('/login', 'Admin\UserController@dologin');
Route::post('/login', 'Admin\UserController@login');
