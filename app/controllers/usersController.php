<?php

class usersController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users/signup');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), User::$rules, User::$messages);
		if($validation->passes())
		{
			$user = new User;
			$user->name = Input::get('fname');
			$user->email = Input::get('email');
			$user->phone_no = Input::get('phone');
			$user->usertype = Input::get('usertype');
			$user->password = Hash::make( Input::get('passwd') );
			$user->save();

		}
		else{
			return Redirect::back()->withInput(Input::except('passwd'))->withErrors($validation);

		}
			
		
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


}
