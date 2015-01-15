<?php

class usersController extends \BaseController {

	/**
	 * Show the form for registering a new user.
	 *
	 * @return Response
	 */
	public function register()
	{
		Auth::logout();
		return View::make('users/register');
	}


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
			$user->user_type = strtolower(Input::get('user_type'));
			$user->password = Hash::make( Input::get('password') );

			$newcode = $this->generateConfirmationCode();
			$user->confirmation_code = $newcode;
			$result = $user->save();
			if($user->user_type == 'designer'){
				$designer = new Designer;
				$designer->user_id = $user->id;
				$designer->save();

			}elseif($user->user_type == 'customer'){
				$customer = new Customer;
				$customer->user_id = $user->id;
				$customer->save();
			}
			//$user = User::where('email', '=',Input::get('email'))->first();
			$data  = array('email' => Input::get('email'),
			'token'=>$newcode.':'.$user->id,'name'=>$user->name );

			Mail::queue('emails.thankyou',$data, function($message)
			{
				$message ->to(Input::get('email'))->subject('Welcome!');

			});
			Auth::login($user);
			if(Session::has('intended')){				
				return Redirect::to(Session::get('intended'))->withInput(Input::except('password'))->withErrors('Thanks for registering.');	
			}else{
				return Redirect::to('login')->withInput(Input::except('password'))->withErrors('Thanks for registering.');
			}
		}
		else{
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($validation);
		}
	}

	public function generateConfirmationCode(){
		for($code_length=25, $newcode='';strlen($newcode) < $code_length; $newcode .= chr(!rand(0,2) ?rand(48,57):(!rand(0,1) ? rand(65,90):rand(97,122))));
		return $newcode;
	}

	public function confirm($confirmation_code){
		$code = explode(":", $confirmation_code);
		$user= User::find($code[1]);
		if ($user && $user->confirmation_code == $code[0]) {
			$user->confirmed = 1;
			$user->confirmation_code = null;
			$user->save();
			Auth::login($user);
			return Redirect::to('/')->with('status', 'Your account has been successfully confirmed.');
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
			return Redirect::to('/');
		}elseif (Auth::viaRemember()){
			return Redirect::back();
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

		if(Auth::attempt(array('email' => $email, 'password'=>$passwd),$rememberme))
		{
			return Redirect::intended('user/dashboard');
		}
		elseif(Auth::validate(array('email' => $email, 'password'=>$passwd)))
		{
			$user = User::where('email','=',$email)->first();
			$message = "Your account has not been confirmed.";

			$resetCode =true;

			Session::put('resetCode',$resetCode);
			Session::put('id',$user->id);
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($message);
		}
		else{
			$message = "Your email or password is wrong";
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($message);	
		}		
		
	}

	public function dashboard(){
		if(Auth::check()){
			$jobs = JobRequest::all();
			$categories = Category::all();
			return View::make('users/'.Auth::user()->user_type.'/dashboard',['jobs'=>$jobs,'categories'=>$categories]);
		}
		return Redirect::to('login')->with('status', 'Please login or create a new account.');
	}
	public function resetConfirmationCode($id){

		$user = User::find($id);
		$newcode = $this->generateConfirmationCode();
		$user->confirmation_code = $newcode;
		$user->save();
		echo $user->email;
		$data  = array('email' => $user->email,
			'token'=>$newcode.':'.$user->id,'name'=>$user->name );
		Mail::queue('emails.verify',$data, function($message) use ($user)
			{
				$message ->to($user->email)->subject('Email Confirmation Code');

			});
		$msg = "A link has been sent to your email.";
		return Redirect::back()->withInput(Input::except('passwd'))->withErrors($msg);
	}
	
	
	public function forgotPassword(){
		
	}


}
