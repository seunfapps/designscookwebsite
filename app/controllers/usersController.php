<?php

class usersController extends \BaseController {

	public function dashboard(){
		if(Auth::check()){
			$user = Auth::user();
			switch ($user->userable_type) {
				case 'Designer':
					$projects = CustomerProject::all();
					$categories = Category::lists('name','id');
					array_push($categories,'All');
					asort($categories);
					echo implode(",", $categories);
					return View::make('users/designer/dashboard',['categories'=>$categories])->nest('child','users/designer/cust_projects',['projects'=>$projects,'projectstatus'=>'']);	
				case 'Customer':
					$projects = $user->userable->projects;
					return View::make('users/customer/dashboard')->nest('child','users/customer/cust_projects',['projects'=>$projects,'name'=>$user->name]);	
				default:
					# code...
					break;
			}		
		}
		return Redirect::to('login')->with('status', 'Please login or create a new account.');
	}

	public function cust_projects($category = 'All', $status = null){
		if(Request::ajax()){

			$projects = null;
			if ($category == 'All') {
				if(empty($status)){
					$projects = CustomerProject::all();	
				}else{
					$projects = CustomerProject::where('status','=',$status)->get();
				}
			}
			else{
					$projects = CustomerProject::where('status','=',$status)->get();

			}
			$view =  View::make('users/designer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
			return $view;
		}else{
			$projects = '';
			if(Auth::check()){
				$user = Auth::user();
				if(empty($status)){
					$projects = CustomerProject::all();	
				}else{
					$projects = CustomerProject::where('status','=',$status)->get();
				}
				return View::make('users/designer/cust_projects',['projects'=> $projects,'projectstatus'=>$status]);
					
			}
		}
		
		
	}

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
			$user->password = Hash::make( Input::get('password') );

			$newcode = $this->generateConfirmationCode();
			$user->confirmation_code = $newcode;
			if(Input::get('user_type') == 'Designer'){
				$designer = new Designer;
				$designer->save();
				$designer->user()->save($user);

			}elseif(Input::get('user_type') == 'Customer'){
				$customer = new Customer;
				$customer->save();
				$customer->user()->save($user);
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
				return Redirect::to('user/dashboard')->withInput(Input::except('password'))->withErrors('Thanks for registering.');
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
	{			$resetCode =true;
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


			Session::put('resetCode',$resetCode);
			Session::put('id',$user->id);
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($message);
		}
		else{
			$message = "Your email or password is wrong";
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($message);	
		}				
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
