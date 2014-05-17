<?php
 
class UsersTableSeeder extends Seeder {

	public function run() {
		
  		$user1 = User::create(array(
  			'email' 		=> 'stefanos@testMail.com',
			'username'		=> 'stefanos',
			'password' 		=> Hash::make('password'),
			'password_temp' => '',
			'code' 			=> '',
			'active'		=> 1
  		));

  		$user2 = User::create(array(
  			'email' 		=> 'bani@testMail.com',
			'username'		=> 'bani',
			'password' 		=> Hash::make('password'),
			'password_temp' => '',
			'code' 			=> '',
			'active'		=> 1
  		));

  		$user3 = User::create(array(
  			'email' 		=> 'giannis@testMail.com',
			'username'		=> 'giannis',
			'password' 		=> Hash::make('password'),
			'password_temp' => '',
			'code' 			=> '',
			'active'		=> 1
  		));

  		$user4 = User::create(array(
  			'email' 		=> 'flori@testMail.com',
			'username'		=> 'flori',
			'password' 		=> Hash::make('password'),
			'password_temp' => '',
			'code' 			=> '',
			'active'		=> 1
  		));

	}
 
}
