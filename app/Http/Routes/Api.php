<?php
Route::group(['prefix'=>'api', 'namespace'=>'Api'],function(){
	Route::post('/signup','UserController@signup')->name("signup");
	Route::post('/verifyUser','UserController@verifyUser')->name("verifyUser");
	Route::post('/signin','UserController@signin')->name("signin");
	Route::post('/resendOtpRegister','UserController@resendOtpRegister')->name("resendOtpRegister");
	Route::post('/resendOtpForgetpass','UserController@resendOtpForgetpass')->name("resendOtpForgetpass");
	Route::post('/resetPassword','UserController@resetPassword')->name("resetPassword");
	Route::post('/changePassword','UserController@changePassword')->name("changePassword");
	Route::post('/check_social_user_exists','UserController@checkSocialUserIsExists')->name("check_social_user_exists");
	Route::post('/social_signin','UserController@socialSignIn')->name("social_signin");
	Route::post('/userProfileUpdate','UserController@userProfileUpdate')->name("userProfileUpdate");
	Route::post('/logout','UserController@logout')->name("logout");


	Route::post('/getCountryList','GeneralController@getCountryList')->name("getCountryList");
	Route::post('/getStateList','GeneralController@getStateList')->name("getStateList");

	
	
	Route::post('/print_token','UserController@print_token')->name("print_token");
});

