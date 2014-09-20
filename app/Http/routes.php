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

Route::get('/rooms/', [
    'as'   => 'rooms.rooms',
    'uses' => 'RoomsController@getRooms'
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
        Route::get('/logout', [
            'as'   => 'user.logout',
            'uses' => 'UserController@getLogout'
        ]);
    });

    Route::group(['prefix' => '/sub/'], function () {
        Route::any('/status', 'SubsController@postStatus');
        Route::post('/translate', 'SubsController@postTranslation');
        Route::post('/timed', 'SubsController@postTimed');
    });
});
