<?php
Route::group(['prefix'=>'Api', 'namespace'=>'Api'],function(){
	Route::post('/signup','UserController@signup')->name("signup");
	Route::post('/print_token','UserController@print_token')->name("print_token");
});