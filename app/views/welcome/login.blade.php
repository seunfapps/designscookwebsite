@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('', 'Login')}}</li>
@stop
@section('content')

		<div class="split dat-scrollnimate" data-animation="bounceIn">
    
		<div class="size4" style="margin-left: 33%;">
        	<div class="block-title"><h2>Log In</h2></div>
            	<div align="center">
            {{ Form::open(['action'=>'welcomeController@login', 'class'=>'login']) }}	
            
            @if ($errors->any())
                    {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif
            <div class="margin-bottom-10px">
           	 {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            <div class="margin-bottom-10px">
            {{Form::password('passwd', ['placeholder'=>'*****', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            <div class="margin-bottom-10px">
            {{Form::checkbox('rememberme', '', ['id'=>'rememberme'])}}<label for="rememberme" style="display:inline-block;"><span style="padding:6px;">&nbsp;Remember me</span></label>
         
            
                <a href="" style="display:inline-block">Forgot Password?</a>
                </div>
                <input type="submit" name="submit" value="Login" class='button'>
              
            {{ Form::close() }}
            </div>
           </div>
        </div>
   
@stop