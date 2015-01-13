@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('job/post', 'Post a job')}}</li>
<li>{{HTML::link(URL::previous(), 'Job brief')}}</li>
<li><span>Job Details</span></li>
@stop
@section('content')

    <div class="block-title"><h2>Job Details</h2></div>
    	<div class="comment-form">
		    <p class="form-name">
            	<label for="">Job Title</label>
            </p>
            <p class="form-comment">
            	{{$job_details['title']}}            
            </p>
            <p class="form-name">
            <label for="">Design Name</label>
            </p>
            <p class="form-comment">
            	{{$job_details ['design_name']}}            
            </p>
            <p class="form-name">
            <label for="">Design Category</label>
            </p>
            <p class="form-comment">
            	{{$job_details ['category']}}            
            </p>
            <p class="form-name">
            <label for="">Cost</label>
            </p>
            <p class="form-comment">
            	{{$job_details ['cost']}}            
            </p>
            <p class="form-submit">
                {{Form::submit('Proceed to payment',['action'=>''])}}                        
            </p>

            {{Form::close()}}
        </div>
	</div>    
            

@stop