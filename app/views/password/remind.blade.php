@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Forgot Password</span></li>
@stop
@section('content')
@if (Session::has('error'))
	{{trans(Session::get('reason'))}}
@elseif(Session::has('success'))
	An email with the password reset has been sent.
@endif

{{ Form::open(array('route'=>'password.request')) }}	
<!--
<form action="{{ action('RemindersController@postRemind') }}" method="POST"> -->
	{{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
	{{Form::submit('Submit')}}<br>
<!-- </form> -->
{{ Form::close() }}
@stop