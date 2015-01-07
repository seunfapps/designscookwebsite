<?php

class usersController extends \BaseController {

public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()	{
		$validation = Validator::make(Input::all(), User::$rules, User::$messages);
		if($validation->passes())
		{
			$user = new User;
			$user->name = Input::get('fname');
			$user->email = Input::get('email');
			$user->phone_no = Input::get('phone');
			$user->user_type = Input::get('user_type');
			$user->password = Hash::make( Input::get('password') );

			for($code_length=25, $newcode='';strlen($newcode) < $code_length; $newcode .= chr(!rand(0,2) ?rand(48,57):(!rand(0,1) ? rand(65,90):rand(97,122))));
				$user->confirmation_code = $newcode;
			$result = $user->save();

			//$user = User::where('email', '=',Input::get('email'))->first();
			$data  = array('email' => Input::get('email'),
			'token'=>$newcode.':'.$user->id );

			Mail::queue('emails.verify',$data, function($message)
			{
				$message ->to(Input::get('email'))->subject('Welcome!');

			});
			
			return Redirect::to('login')->withInput(Input::except('password'))->withErrors('Thanks for registering. A link has been sent to your email.');
		}
		else{
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($validation);
		}
	}


	public function confirm($confirmation_code){
		$code = explode(":", $confirmation_code);
		$user= User::find($code[1]);
		if ($user && $user->confirmation_code == $code[0]) {
			$user->confirmed = 1;
			$user->confirmation_code = null;
			$user->save();
			return Redirect::to('login')->with('status', 'Your account has been successfully confirmed.');
		}
		return Redirect::to('/')->with('status', 'Link has expired');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//

echo $id;

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function auth()
	{
		if(Auth::check()){
			return View::make('welcome/index');
		}else{
			return View::make('users/login');	
		}
		
	}

	public function login()
	{
		$email  = Input::get('email');
		$passwd = Input::get('passwd');
		$rememberme = Input::get('rememberme');
		Input::flashExcept('passwd');
		if(Auth::attempt(array('email' => $email, 'password'=>$passwd, 'confirmed'=> 1),$rememberme))
		{
			return Redirect::back();
		}
		else{
			$message = "Your email or password is wrong";
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($message);
		}		
		
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function register()
	{
		return View::make('users/register');
	}
	public function forgotPassword(){
		
	}


}
