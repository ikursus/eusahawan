<?php

Route::get('/', 'PageController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route untuk paparkan senarai user
Route::group(['prefix' => 'users'], function () {

    Route::get('/', 'UserController@index');
    // Route untuk paparkan borang tambah user
    Route::get('/create', 'UserController@create');

    // Route untuk paparkan borang tambah user
    Route::get('/{id}/edit', 'UserController@edit')->where(['id' => '[0-9]+']);

});
