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

	public function contactus(){
		$data = [
			'name'=>Input::get('name'),
			'message'=>Input::get('message'),
			'email'=>Input::get('email'),
			];
		$feedback = Feedback::create($data);
		$feedback->save();
		Mail::queue('emails.feedback', $data, function($message){
			$message ->to(Input::get('email'))->subject('Thank you for contacting us');
		});
		return Redirect::back()->with('status', 'Feedback was successfully sent.');
	}

	public function subscribe(){
		$validation = Validator::make(Input::all(), Subscription::$rules, Subscription::$messages);
		if($validation->passes())
		{
			$data = [
				'email'=>Input::get('subscription_email'),
				'unsubscribe'=> 'unsubscribe/'.Input::get('subscr_email')
			];
			$subscribe = Subscription::create($data);
			$subscribe->save();
			Mail::queue('emails.subscribe', $data, function($message){
				$message ->to(Input::get('subscription_email'))->subject('Thank you for subscribing');
			});
			return Redirect::back()->with('status', 'Your email has been successfully added to our database.');
		}
		else{
			return Redirect::back()->withInput()->withErrors($validation);
		}
	}

	public function unsubscribe($email){
		if($email){
			Subscription::where('email','=',$email)->first()->delete();
			return Redirect::to('/')->with('status', 'You have successfully unsubscribed from our newsletter service.');
		}
	}
}
