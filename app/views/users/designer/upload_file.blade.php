@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Forgot Password</span></li>
@stop
@section('content')

		<div class="split dat-scrollnimate" data-animation="bounceIn">
    
		<div class="size4" style="margin-left: 33%;">
        	<div class="block-title"><h2>Upload File(s)</h2></div>
            	<div align="center">
         <!--   {{ Form::open(['action'=>'usersController@create', 'class'=>'login']) }}	
            
            @if ($errors->any())
                    {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif -->
            
          <p>If you have multiple files, zip them up!</p>
            
            <div class="margin-bottom-10px">
            <input type="file" name="" id="">
           	 {{Form::file('input', '', [ 'required'=>'true'])}}
            </div>
            
                <input type="submit" name="submit" value="Submit" class='button'>
              
           <!--  {{ Form::close() }} -->
            </div>
           </div>
        </div>
 
@stop