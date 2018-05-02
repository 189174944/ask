<?php

//Route::get('/','Api\TopicController@getTopic');
Route::get('/artical/getDetail', 'Api\ArticalController@getDetail');

Route::get('/topic_manager/get', 'Api\TopicManager@getManager');
Route::post('/topic_manager/post', 'Api\TopicManager@postManager');
Route::post('/topic_manager/delete', 'Api\TopicManager@deleteManager');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});