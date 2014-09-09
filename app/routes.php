<?php

Route::get('/', [
    'as'   => 'index',
    'uses' => 'HomeController@getIndex'
]);

Route::group(['before' => 'guest'], function() {
    Route::post('/login', [
        'as'   => 'user.login',
        'uses' =>  'UserController@postLogin'
    ]);
    Route::get('/register', [
        'as'   => 'user.register',
        'uses' => 'UserController@getRegister'
    ]);
});

Route::group(['before' => 'auth'], function () {
    Route::group(['prefix' => '/user/'], function () {
        Route::get('/rooms', [
            'as'   => 'user.rooms',
            'uses' => 'RoomsController@getUserRooms'
        ]);
        Route::post('/logout', [
            'as'   => 'user.logout',
            'uses' => 'UserController@postLogout'
        ]);
    });
});
