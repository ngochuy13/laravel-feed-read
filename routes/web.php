<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::group(
    [
        'prefix' => 'import'
    ],
    function() {
        Route::get(
            '/',
            [
                'as'   => 'Import.index',
                'uses' => 'ImportController@index',
            ]
        );
    }
);
Route::group(
    [
        'prefix' => 'blog'
    ],
    function() {
        Route::any(
            '/',
            [
                'as'   => 'Blog.index',
                'uses' => 'BlogController@index',
            ]
        );

        Route::any(
            '/{id}/detail',
            [
                'as'   => 'Blog.detail',
                'uses' => 'BlogController@show',
            ]
        );

        Route::post(
            'update',
            [
                'as'   => 'Blog.update',
                'uses' => 'BlogController@update',
            ]
        );

        Route::any(
            'create',
            [
                'as'   => 'Blog.create',
                'uses' => 'BlogController@create',
            ]
        );

        Route::any(
            '/{id}/delete',
            [
                'as'   => 'Blog.delete',
                'uses' => 'BlogController@destroy',
            ]
        );
    }
);
