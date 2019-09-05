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
    $title = 'Projek e-Usahawan RISDA';
    // return view('welcome', ['title' => $title]);
    // return view('welcome')->with('title', $title);
    return view('welcome', compact('title'));
});



Route::get('hubungi', function () {
    return view('hubungi');
});

Route::get('profile/{username?}', function($username = null) {

    // if ($username == null)
    if(is_null($username))
    {
        return 'Tiada rekod username.';
    }
    
    return 'Username profile user ini adalah: ' . $username;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route untuk paparkan senarai user
Route::group(['prefix' => 'users'], function () {

    Route::get('/', function () {

        $senarai_users = [
            ['id' => 1, 'name' => 'Ali', 'email' => 'ali@gmail.com', 'status' => 'active'],
            ['id' => 2, 'name' => 'Abu', 'email' => 'abu@gmail.com', 'status' => 'banned'],
            ['id' => 3, 'name' => 'Ah Leong', 'email' => 'ahleong@gmail.com', 'status' => 'active'],
        ];
    
        return view('users.template_senarai', compact('senarai_users'));
    });
    // Route untuk paparkan borang tambah user
    Route::get('/create', function () {
        return 'Ini adalah halaman borang tambah user baru';
    });
    // Route untuk paparkan borang tambah user
    Route::get('/{id}/edit', function ($id) {
        return 'Ini adalah halaman borang edit user bernombor ID: ' .$id;
    })->where(['id' => '[0-9]+']);

});
