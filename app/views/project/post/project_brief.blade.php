@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('project/post', 'Post a project')}}</li>

<li><span>Project Brief</span></li>
@stop
@section('content')
    <div class="inner-wrapper">
    <div class="block-title"><h2>Project Brief</h2></div>
        
        <div class="comment-form">                           
            {{Form::model($project, array('action'=>'ProjectsController@updatebrief', 'files'=>true))}}
            <?echo $project;?>
            @if ($errors->any())
                {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
            @endif
            <p class="form-info" style="font-size:24px;">{{$project->design_name}} Design Price : {{$project->cost}}</p>
            <!--<p class="form-info">Tell us about the work you want done</p>-->
            <p class="form-name">
            <label for="">Title<span class="required">*</span></label>
            {{Form::text('title', Input::old('title'), ['placeholder'=>'Project Title', 'class'=>'input-text', 'required'=>'true'])}}
            </p>
            <p class="form-comment">
            <label for="">Description<span class="required">*</span></label>
            {{Form::textarea('description', Input::old('description'), ['placeholder'=>'Some information that may come in handy for designers',  'required'=>'true'])}}
            </p>
            <p class="form-comment">
                <label for="">File<span class="required"></span></label>
            {{Form::file('file', array('style'=>'margin-left:29%;', 'id'=>'upload'))}}
            <i>(The size of the file should not be more than 15MB. Multiple files should be added to a zip folder.)</i>
            </p>
             @if($project->filename)
             
                <p>You have uploaded {{$project->filename}} {{HTML::link('project/file/delete/'.explode(',', $project->file)[1],'Delete',['style'=>'color:red;','class'=>'delete'])}}. Uploading a new file will replace the old file.</p>
            @endif
            <p class="form-submit">
                {{Form::submit('Proceed')}}                        
            </p>

            {{Form::close()}}
        </div>    
     
</div>
@stop