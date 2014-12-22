@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Reset Password</span></li>
@stop

@section('content')
@if (Session::has('error'))
	{{Session::get('error')}}
  {{ trans(Session::get('reason')) }}
@endif
{{Form::open(array('route' => array('password.update', $token)))}}

	{{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
	{{Form::password('password', ['placeholder'=>'Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
	{{Form::password('password_confirmation', ['placeholder'=>'Confirm Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
	{{Form::hidden('token',$token)}}
	{{Form::submit('Submit')}}

@stop