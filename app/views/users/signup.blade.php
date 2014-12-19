@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Register</span></li>
@stop
@section('content')
<!-- some content here -->
<h1>Sign up</h1>
{{ Form::open(['action'=>'usersController@store']) }}
@if ($errors->any())
        {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
@endif	
	{{Form::radio('usertype', 'designer',null, ['id'=>'designer', 'required'=>'true'])}} <label for="designer"> I'm a designer</label>
	{{Form::radio('usertype', 'customer',null, ['id'=>'customer', 'required'=>'true'])}} <label for="customer"> I'm a customer</label> <br>
	{{Form::text('fname', '', ['placeholder'=>'First Name', 'class'=>'input-text', 'required'=>'true'])}}<br>
	{{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}<br>
	{{Form::text('phone', '', ['placeholder'=>'Phone Number', 'class'=>'input-text'])}}<br>
	{{Form::password('passwd', ['placeholder'=>'Password',  'class'=>'input-text', 'required'=>'true'])}}<br>
	{{Form::submit('Sign up', ['class'=>'input-text'])}}<br>
{{ Form::close() }}
@stop