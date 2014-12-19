@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Register</span></li>
@stop
@section('content')
<div class="page-block lightcolor">
	<div class="inner-wrapper">

		<div class="split dat-scrollnimate" data-animation="bounceIn">
    
		<div class="size4" style="margin-left: 33%;">
        	<div class="block-title"><h2>Register</h2></div>
            	<div align="center">
           {{ Form::open(['action'=>'usersController@store','class'=>'login']) }}
            
            @if ($errors->any())
                    {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif
            
            <div class="margin-bottom-10px">{{Form::radio('usertype', 'customer',null, ['id'=>'customer', 'required'=>'true'])}} <label for="customer">Customer</label>{{Form::radio('usertype', 'designer',null, ['id'=>'designer', 'required'=>'true'])}} <label for="designer">Designer</label> <br></div>
            
            <div class="margin-bottom-10px">
           	 {{Form::text('fname', '', ['placeholder'=>'First Name', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
            <div class="margin-bottom-10px">
           	 {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
             <div class="margin-bottom-10px">
            {{Form::text('phone', '', ['placeholder'=>'Phone Number', 'class'=>'input-text'])}}
            </div>

            <div class="margin-bottom-10px">
            {{Form::password('passwd', ['placeholder'=>'Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
            
                
                <input type="submit" name="submit" value="Register" class='button'>
              
            {{ Form::close() }}
            </div>
           </div>
        </div>
    </div>
</div>
@stop