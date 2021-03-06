<?php

Route::get('/', 'PageController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route untuk paparkan senarai user
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {

    Route::get('/', 'UserController@index');
    // Route untuk paparkan borang tambah user
    Route::get('/create', 'UserController@create');
    Route::post('/create', 'UserController@simpan');

    // Route untuk paparkan borang tambah user
    Route::get('/{id}/edit', 'UserController@edit')->where(['id' => '[0-9]+']);
    Route::patch('/{id}/edit', 'UserController@update')->where(['id' => '[0-9]+']);

    Route::delete('{id}', 'UserController@hapus');

});
Route::get('projects/datatables', 'ProjectController@datatables')->name('projects.datatables');
Route::resource('projects', 'ProjectController');




