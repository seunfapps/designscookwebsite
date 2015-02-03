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
Route::get('business_packages', function(){
	return View::make('welcome/payment_packages');
});
Route::get('logout', function(){
  Auth::logout(); //logout the current user
  Session::flush(); //delete the session
  return Redirect::to('login'); //redirect to login page
});


Route::get('/', 'welcomeController@index');
Route::post('contactus', 'welcomeController@contactus');
Route::post('subscribe', 'welcomeController@subscribe');

Route::get('login', 'usersController@auth');
Route::post('login', array('before'=>'csrf', 'uses' => 'usersController@login', 'as'  => 'users.login'));

Route::get('register', 'usersController@register');
Route::post('register',  array('uses' => 'usersController@store', 'as'  => 'users.register'));
Route::get('register/verify/{token}', 'usersController@confirm');
Route::get('register/code/{id}', 'usersController@resetConfirmationCode');

Route::get('password/remind/', array('uses' => 'RemindersController@getRemind', 'as'  => 'password.remind'));
Route::get('password/remindemail/{email}', array('uses' => 'RemindersController@getRemindEmail', 'as'  => 'password.remind'));
Route::get('password/reset/{token}', array('uses' => 'RemindersController@getReset', 'as'  => 'password.reset'));
Route::post('password/remind', array('uses' => 'RemindersController@postRemind', 'as'  => 'password.remind'));
Route::post('password/reset', array('uses' => 'RemindersController@postReset', 'as'  => 'password.update'));

Route::get('project/post', array('uses' => 'ProjectsController@create', 'as'  => 'project.post'));
Route::get('project/post/brief/{id}', array('uses' => 'ProjectsController@brief', 'as'  => 'project.brief'));
Route::post('project/post/brief', array('uses' => 'ProjectsController@updatebrief', 'as'  => 'project.brief'));
Route::get('project/post/confirm_details', array('uses' => 'ProjectsController@confirm_details', 'as'  => 'project.details'));
Route::get('project/details/{id}', array('uses' => 'ProjectsController@proj_details', 'as'  => 'project.details'));
Route::post('project/file/delete/{filename}', array('uses' => 'ProjectsController@deletefile'));


Route::group(['before'=>'auth'], function(){
	Route::get('user/profile',function(){
			$user = Auth::user();
		if(Auth::user()->userable_type == 'Designer'){
			return View::make('users/designer/updateprofile',['user'=>$user]);
		}elseif(Auth::user()->userable_type == 'Customer'){
			return View::make('users/customer/updateprofile',['user'=>$user]);
		}
	});	

	Route::get('user/dashboard/{page?}',['uses'=>'usersController@dashboard'] );

	Route::post('designer/updateprofile',['before'=>'isDesigner|ajax', 'uses'=>'DesignersController@updateprofile'] );
	Route::get('designer/dashboard/{page?}',['before'=>'isDesigner','uses'=>'DesignersController@dashboard'] );
	Route::get('designer/projects/{category}/{status?}',['before'=>'isDesigner|ajax','uses'=>'DesignersController@cust_projects']);
	Route::get('project/changestatus/{id}/',['before'=>'isDesigner','uses'=>'ProjectsController@changestatus']);


	Route::post('customer/updateprofile',['before'=>'isCustomer|ajax', 'uses'=>'DesignersController@updateprofile'] );
	Route::get('customer/dashboard/{page?}',['before'=>'isCustomer','uses'=>'customersController@dashboard'] );
	Route::get('customer/projects/{category}/{status?}',['before'=>'isCustomer|ajax','uses'=>'customersController@cust_projects']);
	Route::get('customer/project/changestatus/{id}/',['before'=>'isCustomer|ajax','uses'=>'ProjectsController@changestatus']);

	Route::get('user/changepassword',function(){
		return View::make('users/changepassword');
	});	
	Route::post('user/updatepassword',['uses'=>'usersController@changepassword'] );

	Route::get('project/payment', array('uses' => 'ProjectsController@payment'));     
 Route::post('project/payment', array('uses' => 'ProjectsController@payment'));      
});
Route::get('category/create', array('before'=>'isAdmin','uses' => 'CategoriesController@create', 'as'  => 'category.create'));
Route::post('category/create', array('uses' => 'CategoriesController@store', 'as'  => 'category.create'));
 
Route::get('update','usersController@updateProfile');
