@extends('layouts.master')
@section('pagetree')
<li><a href="index.html">Homepage</a></li>
<li><span>Login</span></li>
@stop
@section('content')
<div class="page-block lightcolor">
	<div class="inner-wrapper">

		<div class="split dat-scrollnimate" data-animation="bounceIn">
    
		<div class="size4" style="margin-left: 33%;">
        	<div class="block-title"><h2>Reset</h2></div>
            	<div align="center">
            {{ Form::open(['action'=>'usersController@create', 'class'=>'login']) }}	
            
            @if ($errors->any())
                    {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif
            
          
            
            <div class="margin-bottom-10px">
           	 {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
            <div class="margin-bottom-10px">
            {{Form::password('oldpasswd', ['placeholder'=>'Old Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
            <div class="margin-bottom-10px">
            {{Form::password('newpasswd', ['placeholder'=>'New Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
                
                <input type="submit" name="submit" value="Reset" class='button'>
              
            {{ Form::close() }}
            </div>
           </div>
        </div>
    </div>
</div>
@stop