@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Forgot Password</span></li>
@stop
@section('content')
@if (Session::has('error'))
	{{Session::get('error')}}
	{{trans(Session::get('reason'))}}
@elseif(Session::has('status'))
	{{Session::get('status')}}
@endif

{{ Form::open(array('route'=>'password.request')) }}	

	{{Form::label('', 'Enter the email you used to register. We will send you a link to reset your password.', [ 'class'=>''])}}<br>
	{{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
	{{Form::submit('Reset Password')}}<br>
{{ Form::close() }}
@stop