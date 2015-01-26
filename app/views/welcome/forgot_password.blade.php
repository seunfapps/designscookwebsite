@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Forgot Password</span></li>
@stop
@section('content')

	<div class="split dat-scrollnimate" data-animation="bounceIn">

    	<div class="size4" style="margin-left: 33%;">
        	<div class="block-title"><h2>Forgot Password</h2></div>
            	<div align="center">
            {{ Form::open(['action'=>'usersController@create', 'class'=>'login']) }}	
            
            @if ($errors->any())
                    {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif
            
          <p>Enter the e-mail you used to register, we will send you a link to reset your password.</p>
            
            <div class="margin-bottom-10px">
           	 {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true', 'style'=>'width: 100%'])}}
            </div>
            
            <input type="submit" name="submit" value="Submit" class='button'>
              
            {{ Form::close() }}
            </div>
       </div>
    </div>

@stop