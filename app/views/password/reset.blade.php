@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Reset Password</span></li>
@stop
<!--<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <input type="submit" value="Reset">
</form>-->
@section('content')
@if (Session::has('error'))
  {{ trans(Session::get('reason')) }}
@endif
{{Form::open(array('route' => array('password.update', $token)))}}

	{{Form::email('email')}}
	{{Form::password('password')}}
	{{Form::password('password_confirmation')}}
	{{Form::hidden('token',$token)}}
	{{Form::submit('Submit')}}

@stop