<?php

Route::group(
    [
        'prefix' => 'pdf',
        'middleware' => ['role:administrator|quanly|nhanvien']
    ],
    function() {
        Route::get(
            '/orders',
            [
                'as'   => 'Pdf.orders',
                'uses' => 'PDFController@export',
            ]
        );
        Route::get(
            '/html',
            [
                'as'   => 'Pdf.html',
                'uses' => 'PDFController@html',
            ]
        );
    }
);