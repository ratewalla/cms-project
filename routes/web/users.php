<?php

use Illuminate\Support\Facades\Route;

// only admins can access these routes
Route::middleware('role:admin')->group(function(){

    Route::get('/users/', 'UserController@index')->name('users.index');
    Route::put('/users/{user}/attach', 'UserController@attachRole')->name('users.role.attach');
    Route::put('/users/{user}/detach', 'UserController@detachRole')->name('users.role.detach');
    
});

//only admin and individual user can access routes
Route::middleware(['auth','can:view,user'])->group(function(){
    
    Route::get('/users/{user}/profile', 'UserController@showProfile')->name('user.profile.show');

    Route::put('/users/{user}/update', 'UserController@updateProfile')->name('user.profile.update');

    Route::delete('/users/{users}/destroy', 'UserController@destroy')->name('user.destroy');

});

