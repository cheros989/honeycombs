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

Route::namespace('RomanPavliukov\Honeycombs\Http\Controllers')
    ->middleware('web')
    ->group(function () {

    Route::get('/honeycombs/login', [
        'uses' => 'AuthController@loginView',
        'as' => 'honey_login_view'
    ]);

    Route::post('/honeycombs/login', [
        'uses' => 'AuthController@loginAction',
        'as' => 'honey_login'
    ]);

    Route::get('/honeycombs/logout', [
        'uses' => 'AuthController@logoutAction',
        'as' => 'honey_logout'
    ]);

    Route::middleware('honey_auth')->group(function () {

        Route::get('/honeycombs', [
            'uses' => 'HoneyController@lobbyView',
            'as' => 'honey_lobby'
        ]);

        Route::get('/honeycombs/{category}/additem/', [
            'uses' => 'HoneyController@addItemView'
        ]);

        Route::post('/honeycombs/{category}/additem', [
            'uses' => 'HoneyController@addItemAction'
        ]);

        Route::get('/honeycombs/{category}', [
            'uses' => 'HoneyController@itemsOfCategory'
        ]);

        Route::get('/honeycombs/{category}/edit/{id}', [
            'uses' => 'HoneyController@editItemView'
        ]);

        Route::post('/honeycombs/{category}/edit/{id}', [
            'uses' => 'HoneyController@editItemAction'
        ]);
    });
});
