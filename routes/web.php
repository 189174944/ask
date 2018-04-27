<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/users', 'UsersController@index');
    Route::resource('/topic', 'TopicController');
    Route::resource('/login', 'LoginController');
    Route::get('/logout', 'LoginController@logout');
});