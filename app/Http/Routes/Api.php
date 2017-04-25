<?php
Route::group(['prefix'=>'api', 'namespace'=>'Api'],function(){
	Route::post('/signup','UserController@signup')->name("signup");
	Route::post('/verifyUser','UserController@verifyUser')->name("verifyUser");
	Route::post('/signin','UserController@signin')->name("signin");
	Route::post('/resendOtpRegister','UserController@resendOtpRegister')->name("resendOtpRegister");
	Route::post('/resendOtpForgetpass','UserController@resendOtpForgetpass')->name("resendOtpForgetpass");
	Route::post('/resetPassword','UserController@resetPassword')->name("resetPassword");
	Route::post('/changePassword','UserController@changePassword')->name("changePassword");


	Route::post('/saveUserInfo','UserController@saveUserInfo')->name("saveUserInfo");
	
	Route::post('/print_token','UserController@print_token')->name("print_token");
});