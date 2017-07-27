<?php

Route::group(
    [
        'prefix' => 'transactions',
        'middleware' => ['role:administrator|quanly|nhanvien']
    ],
    function() {
        Route::get(
            '/',
            [
                'as'   => 'Transaction.index',
                'uses' => 'TransactionController@index',
            ]
        );

        Route::any(
            'update',
            [
                'as'   => 'Transaction.create',
                'uses' => 'TransactionController@create',
            ]
        );

        Route::post(
            'store',
            [
                'as'   => 'Transaction.store',
                'uses' => 'TransactionController@store',
            ]
        );

    }
);