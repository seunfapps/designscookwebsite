<?php

class welcomeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('welcome/index');
	}
	
public function register()
	{
		return View::make('welcome/register');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function auth()
	{
		if(Auth::check()){
			return View::make('welcome/index');
		}else{
			return View::make('welcome/login');	
		}
		
	}

	public function login()
	{
		$email  = Input::get('email');
		$passwd = Input::get('passwd');
		$rememberme = Input::get('rememberme');
		Input::flashExcept('passwd');
		if(Auth::attempt(array('email' => $email, 'password'=>$passwd),$rememberme))
		{
			return Redirect::back();
		}
		else{
			$message = "Your email or password is wrong";
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($message);
		}		
		
}

}
