@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Reset Password</span></li>
@stop

@section('content')
  <div class="block-title"><h2>Reset</h2></div>
	<div class="inner-wrapper">
		<div class="split dat-scrollnimate" data-animation="bounceIn">
  		<div class="size4" style="margin-left: 33%;">
        <div align="center">
          {{Form::open(array('route' => array('password.update', $token)))}}
            
            @if (Session::has('error'))
              <div class="woocommerce-error">{{Session::get('error')}}</div>
	            {{trans(Session::get('reason'))}}
 
            @endif
                     
            <div class="margin-bottom-10px">
           	  {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
            <div class="margin-bottom-10px">
              {{Form::password('password', ['placeholder'=>'Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
            <div class="margin-bottom-10px">
              {{Form::password('password_confirmation', ['placeholder'=>'Confirm Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            {{Form::hidden('token',$token)}}
            {{Form::submit('Submit')}}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@stop