<?php

Route::group(
    [
        'prefix' => 'order',
        'middleware' => ['role:administrator|quanly|nhanvien']
    ],
    function() {
        Route::get(
            'list',
            [
                'as'   => 'Order.index',
                'uses' => 'OrderController@index',
            ]
        );
        Route::post(
            'list',
            [
                'as'   => 'Order.index',
                'uses' => 'OrderController@index',
            ]
        );

        Route::any(
            '/{id}/detail',
            [
                'as'   => 'Order.detail',
                'uses' => 'OrderController@show',
            ]
        );

        Route::post(
            'update',
            [
                'as'   => 'Order.update',
                'uses' => 'OrderController@update',
            ]
        );
        Route::get(
            'filter',
            [
                'as'   => 'Order.filter',
                'uses' => 'OrderController@filter',
            ]
        );

    }
);