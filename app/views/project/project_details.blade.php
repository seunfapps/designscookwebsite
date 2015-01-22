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
        <table cellpadding="10">
            <tr>
                <td class="labelAlignRight">Project Title</td>
                <td class="dataAlignLeft">{{$project_details['title']}}</td>
            </tr>
            <tr>
           
                <td class="labelAlignRight">Design Type</td>
                <td class="dataAlignLeft"><span>{{$project_details ['design_name']}}</span></td>
           
            </tr>
            <tr>
              
                <td class ="labelAlignRight"><span >Category</span></td>
                <td class="dataAlignLeft"><span >{{$project_details ['category']}} </span></td>
               
            </tr>
            <tr>
                <td class = "labelAlignRight"><span >Cost</span></td>
                <td class="dataAlignLeft"><span>{{$project_details ['cost']}}</span></td>
            </tr>
           
        </table>
		    
               
               
          
           <!--  <p class="form-comment">
            	{{$project_details ['cost']}}            
            </p> -->
            <p class="form-submit">
                {{Form::submit('Proceed to payment')}}                        
            </p>

            {{Form::close()}}
        </div>   

@stop