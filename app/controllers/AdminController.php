<?php

class AdminController extends \BaseController {
	
	public function getLogin() {
		return View::make('admin.login');
	}


}
