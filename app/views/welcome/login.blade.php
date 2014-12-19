@extends('layouts.master')
@section('pagetree')
<li><a href="index.html">Homepage</a></li>
					<li><span>Login</span></li>
@stop
@section('content')
<!-- some content here -->
<h1>Log in</h1>
{{ Form::open(['action'=>'welcomeController@login', 'class'=>'login']) }}	

@if ($errors->any())
        {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
@endif
{{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
{{Form::password('passwd', ['placeholder'=>'*****', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
{{Form::checkbox('rememberme', '', ['id'=>'rememberme'])}}<label for="rememberme" style="display:inline-block; padding:6px;">Remember me</label>

	<a href="">Forgot Password?</a>
	<input type="submit" name="submit" value="Login" class='button'>
{{ Form::close() }}
@stop