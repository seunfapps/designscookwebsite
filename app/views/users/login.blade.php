@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Login</span></li>
@stop
@section('content')

		<div class="split dat-scrollnimate" data-animation="bounceIn">
    
		<div class="size4" style="margin-left: 33%;">
        	<div class="block-title"><h2>Log In</h2></div>
            	<div align="center">
            {{ Form::open(['action'=>'users.login', 'class'=>'login']) }}	
            
            @if ($errors->any())
                    {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif
            <div class="margin-bottom-10px">
           	 {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            <div class="margin-bottom-10px">
            {{Form::password('passwd', ['placeholder'=>'Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            <div class="margin-bottom-10px">
            {{Form::checkbox('rememberme', '', ['id'=>'rememberme'])}}
            <label for="rememberme" style="display:inline-block;"><span style="padding:6px;">&nbsp;Remember me</span></label>
            
            </div>
            {{Form::submit('Login', ['class'=>'button'])}}
            <div>{{HTML::link('password/remind', 'Forgot Password?',['style'=>'display:inline-block;'])}} or {{HTML::link('register','Create an account')}}</div>
            
              
            {{ Form::close() }}
            </div>
           </div>
        </div>

@stop