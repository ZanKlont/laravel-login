<?php

//echo '<pre>', dd($app), '</pre>';

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

/*
| Authenticated group
 */
Route::group(array('before' => 'auth'), function() {
	
	/*
	| CSRF protection group
	 */
	Route::group(array('before' => 'csrf'), function() {
		/*
		| Change password (POST)
		 */
		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));
	});

	/*
	| Change password (GET)
	 */
	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	/*
	| Sign out (GET)
	 */
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));

});

/*
| Unauthenticated group
 */
Route::group(array('before' => 'guest'), function() {

	/*
	| CSRF protection group
	 */
	Route::group(array('before' => 'csrf'), function() {
		/*
		| Create Account (POST)
		 */
		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		/*
		| Sign in (POST)
		 */
		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		/*
		| Forgot password (POST)
		 */
		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
		));

	});

	/*
	| Sign in (GET)
	 */
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	/*
	| Create Account (GET)
	 */
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));

	/*
	| Forgot password (GET)
	 */
	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));

	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));

	/*
	| Admin login (GET)
	 */
	Route::get('/admin', array(
		'as' => 'admin',
		'uses' => 'AdminController@getLogin'
	));

});