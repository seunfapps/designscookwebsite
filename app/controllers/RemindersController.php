<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	public function getRemindEmail($email){
		return View::make('password/remind')->with('email', $email);
	}
	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email'), function($message){
				$message->subject(trans('DesignsCook: Account Password Reset')); 
			}))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', 'An email with the password reset has been sent.');
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		
		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();

		});
		

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
				return Redirect::back()->with('error','Invalid password' )->withInput(Input::except('password'));
			
			case Password::INVALID_TOKEN:
				return Redirect::to('/')->with('status', 'Link has expired');
			case Password::INVALID_USER:

				return Redirect::back()->with('error', 'This email address does not exist in our system.')->withInput(Input::except('password'));

			case Password::PASSWORD_RESET:
				$user = User::where('email','=',Input::get('email'))->first();
				$data = [
					'name'=> $user->name,
					'email'=>$user->email,
				];
				Mail::queue('emails.resetpasswordsuccess',$data, function($message)
				{
					$message ->to(Input::get('email'))->subject('DesignsCook Account password changed!');

				});
				return Redirect::to('login')->with('status', 'You have successfully reset your password')->withInput(Input::except('password'));
		}
	}

}
