<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('id', '[0-9]+');

Route::get('/', [
    'as'   => 'index',
    'uses' => 'HomeController@getIndex'
]);

Route::get('/rooms/{id}', [
    'as'   => 'rooms.room',
    'uses' => 'RoomsController@getRoom'
]);

Route::group(['before' => 'guest'], function() {
    Route::get('/login', [
        'as'   => 'user.login',
        'uses' => 'UserController@getLogin'
    ]);
    Route::post('/login', [
        'as'   => 'user.login',
        'uses' =>  'UserController@postLogin'
    ]);
    Route::get('/register', [
        'as'   => 'user.register',
        'uses' => 'UserController@getRegister'
    ]);
    Route::post('/register', [
        'as'   => 'user.register',
        'uses' => 'UserController@postRegister'
    ]);
});

Route::group(['before' => 'auth'], function () {
    Route::group(['prefix' => '/user/'], function () {
        Route::get('/rooms/{id?}', [
            'as'   => 'user.rooms',
            'uses' => 'RoomsController@getUserRooms'
        ]);
        Route::get('/logout', [
            'as'   => 'user.logout',
            'uses' => 'UserController@getLogout'
        ]);
    });
});
