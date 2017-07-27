<?php

Route::group(
    [
        'prefix' => 'customer',
        'middleware' => ['role:administrator|quanly|nhanvien']
    ],
    function() {
        Route::get(
            '/',
            [
                'as'   => 'Customer.index',
                'uses' => 'CustomerController@index',
            ]
        );
        Route::any(
            'request',
            [
                'as'   => 'Customer.request',
                'uses' => 'CustomerController@requestCusOrder',
            ]
        );
        Route::post(
            'storerequest',
            [
                'as'   => 'Customer.storecusorder',
                'uses' => 'CustomerController@storeCusOrder',
            ]
        );
        Route::get(
            'request-json',
            [
                'as'   => 'Customer.requestjson',
                'uses' => 'CustomerController@requestJson',
            ]
        );
        Route::post(
            'request-json',
            [
                'as'   => 'Customer.requestjson',
                'uses' => 'CustomerController@requestJson',
            ]
        );
        Route::any(
            'create',
            [
                'as'   => 'Customer.create',
                'uses' => 'CustomerController@create',
            ]
        );
        Route::post(
            'store',
            [
                'as'   => 'Customer.store',
                'uses' => 'CustomerController@store',
            ]
        );

        Route::get(
            '/list',
            [
                'as'   => 'Customer.list',
                'uses' => 'DashBoardController@listCustomer',
            ]
        );

        Route::get(
            'request-list-json',
            [
                'as'   => 'Customer.list.json',
                'uses' => 'CustomerController@requestListJson',
            ]
        );
    }
);