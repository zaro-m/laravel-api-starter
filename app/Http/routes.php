<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => '/api/users',
    'middleware' => ['api']
], function() {
    Route::post('login', 'Api\\AuthenticateController@login');
});

Route::group([
    'prefix' => 'api',
    'middleware' => ['api', 'jwt']
], function() {

    Route::group([
        'prefix' => 'classTypes'
    ], function() {
        Route::get('/', 'Api\\ClassTypesController@find');
        Route::post('/', 'Api\\ClassTypesController@create');
    });

});
