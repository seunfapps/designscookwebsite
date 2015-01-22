@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('project/post', 'Post a project')}}</li>
<li>{{HTML::link('project/brief/'.$project_details['subcategory_id' ], 'Project brief')}}</li>
<li><span>Project Details</span></li>
@stop
@section('content')

    <div class="block-title"><h2>Project Details</h2></div>
    	<div class="comment-form">
        {{Form::open(array('action'=>'ProjectsController@payment'))}}
		    <p class="form-name">
            	<label for="">Project Title</label>
               {{$project_details['title']}} 
            </p>
             <div class="clear-float"></div>
           <!--  <p class="form-comment">
            	{{$project_details['title']}}            
            </p> -->
            <p class="form-name">
            <label for="">Design Name</label>
                {{$project_details ['design_name']}}
            </p>
            <div class="clear-float"></div>
           <!--  <p class="form-comment">
            	{{$project_details ['design_name']}}            
            </p> -->
            <p class="form-name">
            <label for="">Category</label>
            {{$project_details ['category']}} 
            </p>
             <div class="clear-float"></div>
           <!--  <p class="form-comment">
            	{{$project_details ['category']}}            
            </p> -->
            <p class="form-name">
            <label for="">Cost</label>
            {{$project_details ['cost']}}
            </p>
           <!--  <p class="form-comment">
            	{{$project_details ['cost']}}            
            </p> -->
            <p class="form-submit">
                {{Form::submit('Proceed to payment')}}                        
            </p>

            {{Form::close()}}
        </div>
	</div>    

@stop