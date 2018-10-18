<?php

Route::group(['prefix' => 'api'], function () {
    Route::group([

        'middleware' => 'auth:api',

    ], function () {
        //token protected routes

        Route::group([
            'namespace' => 'Oauth',
            'prefix' => 'auth'
        ], function () {
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
        });

        Route::group([
            'namespace' => 'User',
            'prefix' => 'users'
        ], function () {
            Route::post('show', 'UserController@show');
        });

        //
    });

    //Not protected routes

    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('login', 'Oauth\AuthController@login');
    });

    Route::group([
        'namespace' => 'User',
        'prefix' => 'users'
    ], function () {
        Route::post('create', 'UserController@create');
    });
});