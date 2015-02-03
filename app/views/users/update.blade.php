@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Update Profile</span></li>
@stop
@section('content')
<!-- some content here -->
<!-- <h1>Sign up</h1>
{{ Form::open(['']) }}
@if ($errors->any())
        {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
@endif	
	{{Form::text('fname', '', ['placeholder'=>'First Name', 'class'=>'input-text', 'required'=>'true'])}}{{Form::text('lname', '', ['placeholder'=>'Last Name', 'class'=>'input-text'])}}<br>
	{{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}} {{Form::text('company', '', ['placeholder'=>'Company', 'class'=>'input-text'])}}<br>
	{{Form::text('phone', '', ['placeholder'=>'Phone Number', 'class'=>'input-text'])}}{{Form::text('country', '', ['placeholder'=>'Country', 'class'=>'input-text'])}}<br>
	
	{{Form::submit('Update', ['class'=>'input-text'])}}<br>
	<!-- {{Form::submit('Sign up', ['class'=>'input-text'])}}<br> 
{{ Form::close() }} -->


<div class="split dat-scrollnimate" data-animation="bounceIn">
    
		<div class="size4" style="margin-left: 33%;">
        	<div class="block-title"><h2>Update Profile</h2></div>
            	<div align="center">
           {{ Form::open(['class'=>'login']) }}
            
            @if ($errors->any())
                    {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif

            <!-- <div class="margin-bottom-10px">
                    {{Form::radio('user_type', 'Customer',null, ['id'=>'customer', 'required'=>'true', 'style'=>'margin-right:5px;'])}}<label for="customer" style='display:inline-block;'><span style='padding:0 10px 0 0;'>CUSTOMER</span></label>
                    {{Form::radio('user_type', 'Designer',null, ['id'=>'designer', 'required'=>'true', 'style'=>'margin-right:5px;'])}}<label for="designer" style='display:inline-block;'><span style='padding:0 10px 0 0;'>DESIGNER</span></label> 
            </div> -->
            
            
            <div class="margin-bottom-10px">
           	 {{Form::text('fname', '', ['placeholder'=>'First Name', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
            <div class="margin-bottom-10px">
           	 {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
            </div>
            
             <div class="margin-bottom-10px">
                <!-- <input type='tel' placeholder='Phone Number' name='phone' class='input-text' required='true'> -->
            {{Form::number('phone', '', ['placeholder'=>'Phone Number', 'class'=>'input-text', 'required'=>'true'])}}
            </div>

            <!-- <div class="margin-bottom-10px">
            {{Form::password('password', ['placeholder'=>'Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true','autocomplete'=>'off'])}}
            </div>     -->
            <div class="margin-bottom-10px">       
            {{Form::submit('Update', ['class'=>'button'])}}
            </div>
            <!-- <div class="margin-bottom-10px">Already registered? {{HTML::link('login','Click to login')}}</div> -->
            {{ Form::close() }}
            </div>
           </div>
        </div>
@stop