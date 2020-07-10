<?php

use Illuminate\Support\Facades\Route;

Route::get('/post/{post}', 'PostController@show')->name('post');
Route::get('/posts/', 'PostController@index')->name('posts.index');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/create', 'PostController@create')->name('posts.create');

Route::delete('/posts/{post}/destroy', 'PostController@destroy')->name('posts.destroy');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/posts/{post}/update', 'PostController@update')->name('posts.update');