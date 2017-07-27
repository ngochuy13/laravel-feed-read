<?php
Route::group(
    [
        'prefix' => '/admin/role/permission',
        'middleware' => ['role:administrator']
    ],
    function () {
        Route::get(
            '/',
            [
                'as' => 'Roles.permissions',
                'uses' => 'RolePermissionController@index'
            ]
        );
        Route::post(
            'update',
            [
                'as' => 'Roles.permissions.update',
                'uses' => 'RolePermissionController@update'
            ]
        );
    }
);