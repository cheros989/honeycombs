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

Route::get('/honeycombs/login', [
    'uses' => 'RomanPavliukov\Honeycombs\Controllers\AuthController@loginView'
]);

Route::post('/honeycombs/login', [
    'uses' => 'RomanPavliukov\Honeycombs\Controllers\AuthController@loginAction',
    'as' => 'honey_auth'
]);

Route::middleware('honey_auth')->group(function () {

    Route::get('/honeycombs', [
        'uses' => 'RomanPavliukov\Honeycombs\Controllers\HoneyController@lobbyView',
    ]);

    Route::get('/honeycombs/{category}/additem/', [
        'uses' => 'RomanPavliukov\Honeycombs\Controllers\HoneyController@addItemView'
    ]);

    Route::post('/honeycombs/{category}/additem', [
        'uses' => 'RomanPavliukov\Honeycombs\Controllers\HoneyController@addItemAction'
    ]);

    Route::get('/honeycombs/{category}', [
        'uses' => 'RomanPavliukov\Honeycombs\Controllers\HoneyController@itemsOfCategory'
    ]);

    Route::get('/honeycombs/{category}/edit/{id}', [
        'uses' => 'RomanPavliukov\Honeycombs\Controllers\HoneyController@editItemView'
    ]);

    Route::post('/honeycombs/{category}/edit/{id}', [
        'uses' => 'RomanPavliukov\Honeycombs\Controllers\HoneyController@editItemAction'
    ]);

});
