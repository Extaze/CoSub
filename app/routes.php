<?php

Route::get('/', 'HomeController@showIndex');
Route::get('/login', 'HomeController@showLogin');
Route::get('/register', 'HomeController@showRegister');

Route::group(['before' => ''], function () {
// Route::group(['before' => 'auth'], function () {
    Route::group(['prefix' => '/user/'], function () {
        Route::get('/rooms', [
            'as'   => 'user.rooms',
            'uses' => 'RoomsController@showUserRooms'
        ]);
        Route::get('/logout', [
            'as'   => 'user.logout',
            'uses' => 'UserController@doLogout'
        ]);
    });
});
