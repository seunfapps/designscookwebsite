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
Route::get('login', 'welcomeController@auth');
Route::get('register', 'welcomeController@register');
Route::get('logout', 'welcomeController@logout');
Route::post('loggedin', 'welcomeController@login');
Route::get('signup', 'usersController@create');
Route::post('registeruser', 'usersController@store');
Route::get('password/reset', array('uses' => 'RemindersController@getRemind', 'as'  => 'password.remind'));
Route::get('password/reset/{token}', array('uses' => 'RemindersController@getReset', 'as'  => 'password.reset'));
Route::post('password/reset', array('uses' => 'RemindersController@postRemind', 'as'  => 'password.request'));
Route::post('password/reset/{token}', array('uses' => 'RemindersController@postReset', 'as'  => 'password.update'));


