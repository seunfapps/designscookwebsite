@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Register</span></li>
@stop
@section('content')
    <div class="page-block"  >
        <div class="inner-wrapper">
            <div class="block-title"><h2>Register</h2></div>

            <div class="dat-scrollnimate center" data-animation="bounceIn">
    
                <div class="size4">
                    <div align="center">
                    {{ Form::open(['action'=>'users.register','class'=>'login']) }}
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
                        @endif
                        <div class="margin-bottom-10px">
                            {{Form::radio('user_type', 'Customer',null, ['id'=>'customer', 'required'=>'true', 'style'=>'margin-right:5px;'])}}<label for="customer" style='display:inline-block;'><span style='padding:0 10px 0 0;'>I'm a customer</span></label>
                            {{Form::radio('user_type', 'Designer',null, ['id'=>'designer', 'required'=>'true', 'style'=>'margin-right:5px;'])}}<label for="designer" style='display:inline-block;'><span style='padding:0 10px 0 0;'>I'm a designer</span></label> 
                        </div>
                        <div class="margin-bottom-10px">
                            {{Form::text('firstname', '', ['placeholder'=>'First Name', 'class'=>'input-text', 'required'=>'true'])}}
                        </div>
                        <div class="margin-bottom-10px">
                            <!-- <input type='tel' placeholder='Phone Number' name='phone' class='input-text' required='true'> -->
                            {{Form::number('phone', '', ['placeholder'=>'Phone Number', 'class'=>'input-text', 'required'=>'true'])}}
                        </div>
                        <div class="margin-bottom-10px">
                            {{Form::email('email', '', ['placeholder'=>'Email', 'class'=>'input-text', 'required'=>'true'])}}
                        </div>
                        
                        <div class="margin-bottom-10px">
                            {{Form::password('password', ['placeholder'=>'Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true','autocomplete'=>'off'])}}
                        </div>    
                        <div class="margin-bottom-10px">       
                            {{Form::submit('Register', ['class'=>'button'])}}
                        </div>
                        <div class="margin-bottom-10px">Already registered? {{HTML::link('login','Click to login')}}</div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop