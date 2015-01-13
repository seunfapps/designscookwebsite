@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Add a Category</span></li>
@stop
@section('content')
<!-- some content here -->
<h1>Sign up</h1>
{{ Form::open(['action'=>'CategoriesController@store']) }}
@if ($errors->any())
        {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
@endif	
	{{Form::text('name', '', ['placeholder'=>'Name', 'class'=>'input-text', 'required'=>'true'])}}
	{{Form::text('description', '', ['placeholder'=>'Description', 'class'=>'input-text'])}}<br>
	{{Form::select('category', $categories, Input::old('category'))}} 
	{{Form::text('price', '', ['placeholder'=>'Price', 'class'=>'input-text'])}}
	{{Form::submit('Save', ['class'=>'input-text'])}}<br>
{{ Form::close() }}
@stop