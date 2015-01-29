@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('user/dashboard/projects', 'Projects')}}</li>
<li><span>Project Details</span></li>
@stop
@section('content')
    <div class="page-block"  >

        <div class="inner-wrapper">

<div class="panel-block">
	<div class="article-header">
		@if($project->status == 'open')
			<i class="fa fa-unlock left" style='padding-right:5px;'></i>
		@else
			<i class="fa fa-lock left"></i>
		@endif
		<h3>{{HTML::link('project/details/'.$project->id, $project->title)}}
	
		<span class='right'>&#x20A6;{{$project->cost}}</span>

		</h3>
		<h6><i>{{$project->category_name}}</i></h6>
		<div class="theicoon">
			<a href="#"><i class="fa fa-user"></i><span>{{$project->customer->user->firstname}}<i>Author of the Project</i></span></a>
			<a href="#"><i class="fa fa-users"></i><span>{{$project->designers->count()}}
			Entries<i>Designers Interested</i></span></a>
			<a href="#"><i class="fa fa-calendar-o"></i><span>{{$project->created_at}}<i>Date when project was submitted</i></span></a>
		</div>
	</div>
<p >
	{{$project->description}}
	<p>
	@if(Auth::user()->userable->customerprojects->contains($project->id))
		<a href="{{URL::to('project/changestatus/'.$project->id)}}"  class ='s-button right' style='margin-right:20px;'>Following</a>
		<!-- <a href="" class ='s-button right' style='margin-right:20px;'>Download Attachment</a> -->
	@else
		<a href="{{URL::to('project/changestatus/'.$project->id)}}" class ='s-button right' style='margin-right:20px;'>Follow</a>
	@endif
	<a href="" class ='s-button right' style='margin-right:20px;'>Download Attachment</a>
	</p>
</p>

</div>
 </div>
    </div>

{{ HTML::script('jscript/jquery-1.10.2.min.js')}}
    <script>
      function projectdetails(id){
            $.ajax({
                type: "GET",
                url : window.location.origin+ '/project/details/'+ id,
                data : null,
                success : function(data){
                    console.log(data);
                    hideContent();
                    $("#projectdetails").html(data);
                    $("#projectdetails").show();
                    window.history.pushState(null,"", window.location.origin + "/designer/dashboard/projectdetails");
                }
            });
            return false;
    }
	$(function(){
		$(".project_details").on('click',function(e){
			e.preventDefault();
			projectdetails(e.target.id);
		});
   
	});
</script>
@stop