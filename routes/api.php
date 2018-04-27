<?php
//Route::get('/',function (){
//    echo 10000;
//});


//Route::get('/','Api\TopicController@getTopic');
Route::get('/artical/getDetail', 'Api\ArticalController@getDetail');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});