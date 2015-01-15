<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'welcomeController@index');
Route::post('contactus', 'welcomeController@contactus');
Route::get('login', 'usersController@auth');
Route::post('login', array('before'=>'guest|csrf', 'uses' => 'usersController@login', 'as'  => 'users.login'));
Route::get('logout', function(){
  Auth::logout(); //logout the current user
  Session::flush(); //delete the session
  return Redirect::to('login'); //redirect to login page
});

Route::get('register', 'usersController@register');
Route::post('register',  array('uses' => 'usersController@store', 'as'  => 'users.register'));
Route::post('subscribe', 'welcomeController@subscribe');
Route::get('user/dashboard',['before'=>'auth', 'uses'=>'usersController@dashboard'] );
Route::get('register/verify/{token}', 'usersController@confirm');
Route::get('register/code/{id}', 'usersController@resetConfirmationCode');
Route::get('password/remind/', array('uses' => 'RemindersController@getRemind', 'as'  => 'password.remind'));
Route::get('password/remindemail/{email}', array('uses' => 'RemindersController@getRemindEmail', 'as'  => 'password.remind'));
Route::get('password/reset/{token}', array('uses' => 'RemindersController@getReset', 'as'  => 'password.reset'));
Route::post('password/remind', array('uses' => 'RemindersController@postRemind', 'as'  => 'password.remind'));
Route::post('password/reset', array('uses' => 'RemindersController@postReset', 'as'  => 'password.update'));
Route::get('job/post', array('uses' => 'JobRequestsController@create', 'as'  => 'job.post'));
Route::get('job/packages', function(){
	return View::make('welcome/payment_packages');
});
Route::get('job/brief/{id}', array('uses' => 'JobRequestsController@brief', 'as'  => 'job.brief'));
Route::post('job/brief', array('uses' => 'JobRequestsController@updatebrief', 'as'  => 'job.brief'));
Route::get('job/details', array('uses' => 'JobRequestsController@details', 'as'  => 'job.details'));
Route::group(['before'=>'auth'], function(){
 Route::post('job/payment', array('uses' => 'JobRequestsController@payment'));      
});
Route::get('category/create', array('before'=>'isAdmin','uses' => 'CategoriesController@create', 'as'  => 'category.create'));
Route::post('category/create', array('uses' => 'CategoriesController@store', 'as'  => 'category.create'));
 