<?php
Route::group(
    [
        'prefix' => '/admin/role',
        'middleware' => ['role:administrator']
    ],
    function() {
        Route::get(
            'list',
            [
                'as'   => 'Role.index',
                'uses' => 'RoleController@index',
            ]
        );
        Route::any(
            'create',
            [
                'as'   => 'Role.create',
                'uses' => 'RoleController@create',
            ]
        );
        Route::post(
            'store',
            [
                'as'   => 'Role.store',
                'uses' => 'RoleController@store',
            ]
        );
        Route::get(
            '{role}/delete',
            [
                'as' => 'Role.delete',
                'uses' => 'RoleController@destroy'
            ]
        );
        Route::put(
            'update/{id}',
            [
                'as' => 'Role.update',
                'uses' => 'RoleController@update'
            ]
        );
        Route::get(
            '{id}/edit',
            [
                'as' => 'Role.edit',
                'uses' => 'RoleController@edit'
            ]
        );
    }
);