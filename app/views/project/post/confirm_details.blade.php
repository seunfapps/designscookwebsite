@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('project/post', 'Post a project')}}</li>
<li>{{HTML::link('project/post/brief/'.$project->subcategory_id, 'Project brief')}}</li>
<li><span>Project Details</span></li>
@stop
@section('content')
    <div class="page-block"  >

        <div class="inner-wrapper">
            <div class="block-title" align="center"><h2>Project Details</h2></div>
            <div style="margin:0px auto 0px auto; width:50%" data-animation="bounceIn">
                <!-- <div class="size8" > -->
                    <div class="center">
        {{Form::open(array('action'=>'ProjectsController@payment','style'=>'width:50%; padding:10px;'))}}
            <div class='split margin-bottom-10px'>
                <div style='width:100%'>
                    <label for=""  style='width:50%'>Project Title:</label>{{$project->title}}
                </div>
                
            </div>
            <div class='split margin-bottom-10px'>
                <div style='width:100%'>
                    <label for="" style='width:50%'>Design Type:</label>{{$project->design_name}}
                </div>
                
            </div>
            <div class='split margin-bottom-10px'>
                <div style='width:100%'>
                    <label for="" style='width:50%'>Category:</label>{{$project->category}}
                </div>
            </div>
            <div class='split margin-bottom-10px'>
                <div style='width:100%'>
                    <label for="" style='width:50%'>Cost:</label>{{$project->cost}}
                </div>
            </div>
            <p class="form-submit center margin-bottom-10px">
                {{Form::submit('Proceed')}}                        
            </p>

            {{Form::close()}}
        <!-- </div> -->
    </div>
    </div>
</div>
@stop