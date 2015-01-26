@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Login</span></li>
@stop
@section('content')
    <div class="page-block"  >

        <div class="inner-wrapper">
            <div class="block-title" align="center"><h2>Login</h2></div>
    		<div class="dat-scrollnimate center" data-animation="bounceIn">
        		<div class="size4" >
                	<div  align="center">
                        {{ Form::open(['action'=>'users.login', 'class'=>'login']) }}	
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
                            @endif
                            <div class="margin-bottom-10px">
                           	    {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
                            </div>
                            <div class="margin-bottom-10px">
                                {{Form::password('passwd', ['placeholder'=>'Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
                            </div>
                            <div class="margin-bottom-10px">
                                {{Form::checkbox('rememberme', '','',['id'=>'rememberme'])}}
                                <label for="rememberme" style="display:inline-block;"><span style="padding:6px;" >&nbsp;Remember me</span></label>
                            </div>
                            <div class="margin-bottom-10px">{{Form::submit('Login', ['class'=>'button'])}}</div>
                            <div class="margin-bottom-10px">{{HTML::link('password/remind', 'Forgot Password?',['style'=>'display:inline-block;'])}} or {{HTML::link('register','Create an account')}}</div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop