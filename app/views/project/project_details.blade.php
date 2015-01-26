@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('project/post', 'Post a project')}}</li>
<li>{{HTML::link('project/brief/'.$project_details['subcategory_id' ], 'Project brief')}}</li>
<li><span>Project Details</span></li>
@stop
@section('content')
    <div class="page-block"  >

        <div class="inner-wrapper">
            <div class="block-title" align="center"><h2>Project Details</h2></div>
            <div style="margin:0px auto 0px auto; width:50%" data-animation="bounceIn">
                <!-- <div class="size8" > -->
                    <div >
        {{Form::open(array('action'=>'ProjectsController@payment','style'=>''))}}
                
            <div class='split'>
                <div style='width:50%'>
                    <label for="">Project Title</label>
                </div>
                <div class='size4'>
                    <p>{{$project_details['title']}}</p>
                </div>
            </div>
            <div class='split'>
                <div style='width:50%'>
                    <label for="">Design Type</label>
                </div>
                <div >
                    <p>{{$project_details ['design_name']}}</p>
                </div>
            </div>
            <div class='split'>
                <div style='width:50%'>
                    <label for="">Category</label>
                </div>
                <div class='size4'>
                    <p>{{$project_details ['category']}}</p>
                </div>
            </div>
            <div class='split'>
                <div class='size4'>
                    <label for="">Cost</label>
                </div>
                <div class='size4'>
                    <p>{{$project_details ['cost']}}</p>
                </div>
            </div>
            <p class="form-submit">
                {{Form::submit('Proceed to payment')}}                        
            </p>

            {{Form::close()}}
        <!-- </div> -->
    </div>
    </div>
</div>
@stop