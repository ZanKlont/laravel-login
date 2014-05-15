<?php

class AccountController extends \BaseController {

	public function getSignIn() {
		return View::make('account.signin');
	}

	public function postSignIn() {
		$validator = Validator::make(Input::all(), array(
			'email' => 'required|email',
			'password' => 'required'
		));

		if ($validator->fails()) {
			return Redirect::route('account-sign-in')
 					->withErrors($validator)
 					->withInput();
		} else {	
			
			$remember = (Input::has('remember')) ? true : false ;

			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => 1
			), $remember);

			if($auth) {
				return Redirect::intended('/');
			} else {
				return Redirect::route('account-sign-in')
				->with('global', 'Invalid credentials or you account is not activated.');
			}

		}
		
		return Redirect::route('account-sign-in')
				->with('global', 'There was a problem signing you in. Have you activated your account?');
	}

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), array(
			'email' 			=> 'required|max:50|email|unique:users',
			'username' 			=> 'required|max:20|min:3|unique:users',
			'password' 			=> 'required|max:60|min:6',
			'password_again' 	=> 'required|max:60|same:password'
		));

		if($validator->fails()) {
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		} else {
			
			$email 		= Input::get('email');
			$username 	= Input::get('username');
			$password 	= Input::get('password');

			// Activation Code
			$code 		= str_random(60);

			$user = User::create(array(
				'email' => $email,
				'username' => $username,
				'password' => Hash::make($password),
				'code' => $code,
				'active' => 0
			));

			if($user) {

				/*Mail::send('emails.auth.test', array('name' => 'ZanKlont'), function($message) {
					$message->to('zanklont84@gmail.com', 'Zan Klont')->subject('Test Email');
				});*/

				Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Activate your account');
				});

				return Redirect::route('home')
						->with('global', 'Your account has been created! We have sent you an email to activate your account');
			}

		}
	}

	public function getActivate($code) {
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count()) {
			$user = $user->first();

			// Update user to active state
			$user->active 	= 1;
			$user->code 	= '';

			if($user->save()) {
				return Redirect::route('home')
					->with('global', 'Activated you can now sign in!');
			}

		}

		return Redirect::route('home')
			->with('global', 'We could not activate your accouunt try again later.');
	}

	public function getChangePassword() {
		return View::make('account.password');
	}

	public function postChangePassword() {

		$validator = Validator::make(Input::all(), array(
			'old_password' 		=> 'required',
			'password' 			=> 'required|max:60|min:6',
			'password_again' 	=> 'required|same:password'
		));

		if($validator->fails()) {
			
			return Redirect::route('account-change-password')
					->withErrors($validator);

		} else {

			$user = User::find(Auth::user()->id);

			$old_password 	= Input::get('old_password');
			$password 		= Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())) {
				$user->password = Hash::make($password);

				if($user->save()) {
					return Redirect::route('home')
							->with('global', 'Your password has been changed');
				}
			} else {

				return Redirect::route('account-change-password')
						->with('global', 'Old password is invalid, please provide the right one.');
			
			}

		}

		return Redirect::route('account-change-password')
				->with('global', 'Your password could not be changed.');
	}

	public function getForgotPassword() {
		return View::make('account.forgot');
	}

	public function postForgotPassword() {
		
		$validator = Validator::make(Input::all(), array(
			'email' => 'required|email'
		));

		if($validator->fails()) {
			return Redirect::route('account-forgot-password')
					->withErrors($validator)
					->withInput();
		} else {

			$user = User::where('email', '=', input::get('email'));

			if($user->count()) {
				$user 					= $user->first();

				$code 					= str_random(60);
				$password_temp 			= str_random(10);

				$user->code 			= $code;
				$user->password_temp 	= Hash::make($password_temp);

				if($user->save()) {
					
					Mail::send('emails.auth.recover', array('link' => URL::route('account-recover', $code), 'username' => $user->username, 'password' => $password_temp), function($message) use ($user) {
						$message->to($user->email, $user->username)->subject('Recover your account');
					});
					
					return Redirect::route('home')
							->with('global', 'We have sent you an email, to recover your password please follow the instructions.');
				}

			}

		}

		return Redirect::route('account-forgot-password')
				->with('global', 'Could not request your password.');

	}

	public function getRecover($code) {
		
		$user = User::where('code', '=', $code)
				->where('password_temp', '!=', '');

		if($user->count()) {
			$user 					= $user->first();

			$user->password 		= $user->password_temp;
			$user->password_temp 	= '';
			$user->code 			= '';

			if($user->save()) {
				return Redirect::route('home')
						->with('global', 'Your account has been recovered and you can now sign in with your new password.');
			}
		}

		return Redirect::route('home')
				->with('global', 'We could not recover your account');

	}

}
