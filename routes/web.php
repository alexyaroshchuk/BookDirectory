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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'books'], function () {
    Route::get('/', 'BookController@index')->name('books');
    Route::get('/{id}', 'BookController@show')->where('id', '[0-9]+')->name('books.show');
    Route::middleware(['auth'])->group(function () {
        Route::get('/create', 'BookController@create')->name('books.create');
        Route::post('/store', 'BookController@store')->name('books.store');
        Route::get('/{id}/edit', 'BookController@edit')->where('id', '[0-9]+')->name('books.edit');
        Route::put('/{id}', 'BookController@update')->where('id', '[0-9]+')->name('books.update');
        Route::delete('/{id}', 'BookController@destroy')->where('id', '[0-9]+')->name('books.destroy');
    });
});

Route::group(['prefix' => 'authors'], function () {
    Route::get('/', 'AuthorController@index')->name('authors');
    Route::get('/{id}', 'AuthorController@show')->where('id', '[0-9]+')->name('authors.show');
    Route::middleware(['auth'])->group(function () {
        Route::get('/create', 'AuthorController@create')->name('authors.create');
        Route::post('/store', 'AuthorController@store')->name('authors.store');
        Route::get('/{id}/edit', 'AuthorController@edit')->where('id', '[0-9]+')->name('authors.edit');
        Route::put('/{id}', 'AuthorController@update')->where('id', '[0-9]+')->name('authors.update');
        Route::delete('/{id}', 'AuthorController@destroy')->where('id', '[0-9]+')->name('authors.destroy');
    });
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('categories');
    Route::get('/{id}', 'CategoryController@show')->where('id', '[0-9]+')->name('categories.show');
    Route::middleware(['auth'])->group(function () {
        Route::get('/create', 'CategoryController@create')->name('categories.create');
        Route::post('/store', 'CategoryController@store')->name('categories.store');
        Route::get('/{id}/edit', 'CategoryController@edit')->where('id', '[0-9]+')->name('categories.edit');
        Route::put('/{id}', 'CategoryController@update')->where('id', '[0-9]+')->name('categories.update');
        Route::delete('/{id}', 'CategoryController@destroy')->where('id', '[0-9]+')->name('categories.destroy');
    });
});
