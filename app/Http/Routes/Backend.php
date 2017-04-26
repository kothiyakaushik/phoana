<?php
Route::group(['prefix' => 'admin', 'namespace'=>'BackendControllers'], function () {
    
	Route::get('/',[
		'uses'=> "AuthController@getLogin",
		'as'=> "admin-login"
	]);

	Route::get('/auth/login',[
		'uses'=> "AuthController@getLogin",
		'as'=> "admin-login"
	]);

	Route::post('/',[
		'uses'=> "AuthController@postLogin",
		'as'=> "admin-login"
	]);
	Route::post('/auth/login', [
		'uses'=> "AuthController@postLogin",
		'as'=> "admin-login"
	]);
});