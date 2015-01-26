@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Forgot Password</span></li>
@stop
@section('content')
  <div class="block-title" align="center"><h2>Forgot Password</h2></div>
  <div class="page-block">
  	<div class="inner-wrapper">
  		<div class="split dat-scrollnimate" data-animation="bounceIn">
  		  <div class="size4"  style="margin-left: 33%;">
          <div align="center">
            {{ Form::open(array('route'=>'password.remind')) }}	
              @if (Session::has('error'))
                <div class="woocommerce-error">{{Session::get('error')}}</div>
                	{{trans(Session::get('reason'))}}
             
              @endif
                  <p>Enter the e-mail you used to register, we will send you a link to reset your password.</p>
                  
                  <div class="margin-bottom-10px">
                    {{Form::email('email',Input::old('email'), ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true', 'style'=>'width: 100%'])}}
                  </div>
                  
            			{{Form::submit('Reset Password')}}<br>
              
                          
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@stop