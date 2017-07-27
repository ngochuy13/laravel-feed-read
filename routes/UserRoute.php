<?php

Route::group(
    [
        'prefix' => 'user',
        'middleware' => ['role:administrator']
    ],
    function() {
        Route::get(
            '/list',
            [
                'as'   => 'User.index',
                'uses' => 'UserController@index',
            ]
        );
        Route::any(
            '/create',
            [
                'as'   => 'User.create',
                'uses' => 'UserController@create',
            ]
        );
        Route::post(
            'store',
            [
                'as'   => 'User.store',
                'uses' => 'UserController@store',
            ]
        );
        Route::get(
            '{id}/edit',
            [
                'as' => 'User.edit',
                'uses' => 'UserController@edit'
            ]
        );
        Route::put(
            'update/{id}',
            [
                'as' => 'User.update',
                'uses' => 'UserController@update'
            ]
        );
        Route::get(
            '{id}/delete',
            [
                'as' => 'User.delete',
                'uses' => 'UserController@destroy'
            ]
        );
    }
);

Route::get(
    'user/logout',
    [
        'as' => 'User.logout',
        'uses' => '\App\Http\Controllers\Auth\LoginController@logout'
    ]
);