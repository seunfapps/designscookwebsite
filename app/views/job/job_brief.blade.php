@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('job/post', 'Post a job')}}</li>

<li><span>Job Brief</span></li>
@stop
@section('content')
    <div class="inner-wrapper">
    <div class="block-title"><h2>Job Brief</h2></div>
        
        <div class="comment-form">
                           
            {{Form::model($job_request, array('action'=>'job.brief', 'files'=>true))}}
            <p class="form-info" style="font-size:24px;">{{$name}} Design Price : {{$price}}</p>
            <!--<p class="form-info">Tell us about the work you want done</p>-->
            <p class="form-name">
            <label for="">Title<span class="required">*</span></label>
            {{Form::text('title', Input::old('email'), ['placeholder'=>'Project Title', 'class'=>'input-text', 'required'=>'true'])}}
            
            </p>
            <p class="form-comment">
            <label for="">Description<span class="required">*</span></label>
            {{Form::textarea('description', Input::old('description'), ['placeholder'=>'Some information that may come in handy for designers', 'class'=>'input-text', 'required'=>'true'])}}
            </p>
            <p class="form-name">
            <label for="">File(Optional)<span class="required"></span></label>
            {{Form::file('upload',Input::old('file'), array('style'=>'margin-left:29%'))}}

            </p>
             @if(Session::has('uploaded_file'))
                <p>You have uploaded {{Session::get('uploaded_file')}}</p>
            @endif
            <p class="form-submit">
                {{Form::submit('Proceed')}}                        
            </p>

            {{Form::close()}}
        </div>    
            
</div>
@stop