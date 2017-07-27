<?php
Route::group(
    [
        'prefix' => '/admin/permission',
        'middleware' => ['role:administrator']
    ],
    function() {
        Route::get(
            'list',
            [
                'as'   => 'Permission.index',
                'uses' => 'PermissionController@index',
            ]
        );
        Route::any(
            'create',
            [
                'as'   => 'Permission.create',
                'uses' => 'PermissionController@create',
            ]
        );
        Route::post(
            'store',
            [
                'as'   => 'Permission.store',
                'uses' => 'PermissionController@store',
            ]
        );
        Route::get(
            '{role}/confirm',
            [
                'as' => 'Permission.confirm',
                'uses' => 'PermissionController@confirm'
            ]
        );
        Route::get(
            '{id}/edit',
            [
                'as' => 'Permission.edit',
                'uses' => 'PermissionController@edit'
            ]
        );
    }
);