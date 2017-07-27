<?php

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['role:administrator|quanly|nhanvien']
    ],
    function() {
        Route::get(
            'dashboard',
            [
                'as'   => 'Dashboard.index',
                'uses' => 'DashBoardController@index',
            ]
        );
    }
);