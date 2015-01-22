@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Update Profile</span></li>
@stop
@section('content')
<!-- some content here -->
<h1>Sign up</h1>
{{ Form::open(['action'=>'usersController@edit']) }}
@if ($errors->any())
        {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
@endif	
	{{Form::text('fname', '', ['placeholder'=>'First Name', 'class'=>'input-text', 'required'=>'true'])}}{{Form::text('lname', '', ['placeholder'=>'Last Name', 'class'=>'input-text'])}}<br>
	{{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}} {{Form::text('company', '', ['placeholder'=>'Company', 'class'=>'input-text'])}}<br>
	{{Form::text('phone', '', ['placeholder'=>'Phone Number', 'class'=>'input-text'])}}{{Form::text('country', '', ['placeholder'=>'Country', 'class'=>'input-text'])}}<br>
	{{Form::label('Password'}}{{HTML::link('/', '(Change Password))')}}<br>
	{{Form::submit('Sign up', ['class'=>'input-text'])}}<br>
{{ Form::close() }}
@stop