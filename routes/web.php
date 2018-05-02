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
    Route::get('/topic_search', 'TopicController@search');//话题搜索接口
    Route::post('/deleteArrowId', 'TopicController@deleteArrowId');//删除父话题接口
    Route::post('/insertArrowId', 'TopicController@insertArrowId');//删除父话题接口
});