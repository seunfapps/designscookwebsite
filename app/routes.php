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
Route::get('login', 'usersController@auth');
Route::get('register', 'usersController@register');
Route::post('register',  array('uses' => 'usersController@store', 'as'  => 'users.register'));
Route::get('logout', 'usersController@logout');
Route::post('login', array('uses' => 'usersController@login', 'as'  => 'users.login'));
Route::get('register/verify/{token}', 'usersController@confirm');
Route::get('password/reset', array('uses' => 'RemindersController@getRemind', 'as'  => 'password.remind'));
Route::get('password/reset/{token}', array('uses' => 'RemindersController@getReset', 'as'  => 'password.reset'));
Route::post('password/reset', array('uses' => 'RemindersController@postRemind', 'as'  => 'password.request'));
Route::post('password/reset/{token}', array('uses' => 'RemindersController@postReset', 'as'  => 'password.update'));
Route::get('job/post', array('uses' => 'JobRequestsController@create', 'as'  => 'job.post'));
Route::get('job/details/{id}', array('uses' => 'JobRequestsController@details', 'as'  => 'job.details'));
Route::post('job/details', array('uses' => 'JobRequestsController@update', 'as'  => 'job.details'));
Route::get('job/confirm', array('uses' => 'JobRequestsController@confirm', 'as'  => 'job.confirm'));
