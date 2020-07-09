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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/{post}', 'PostController@show')->name('post');

//sets authentication for specific pages
Route::middleware('auth')->group(function(){

    Route::get('/admin', 'AdminsController@index')->name('admin.index');
    Route::get('/admin/posts/', 'PostController@index')->name('posts.index');
    Route::post('/admin/posts', 'PostController@store')->name('posts.store');
    Route::get('/admin/posts/create', 'PostController@create')->name('posts.create');

    Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('posts.destroy');
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('posts.update');

    Route::get('/admin/users/{user}/profile', 'UserController@showProfile')->name('user.profile.show');
    Route::put('/admin/users/{user}/update', 'UserController@updateProfile')->name('user.profile.update');
    Route::get('/admin/users/', 'UserController@index')->name('users.index');
    Route::delete('/admin/users/{users}/destroy', 'UserController@destroy')->name('user.destroy');

});

// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('posts.edit'); //only authorised users can access edit view

