<div class="panel-block">
	<div class="article-header">
		<h3>{{$project->title}}
		@if($project->status == 'open')
			<i class="fa fa-unlock right"></i>
		@else
			<i class="fa fa-lock right"></i>
		@endif
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
	@if(Auth::user()->userable->projects->contains($project->id))
	<a href="#" id = {{$project->id}}  class ='s-button right fol' style='margin-right:20px;'>Following</a>
	@else
		<a href="#" id = {{$project->id}}  class ='s-button right fol' style='margin-right:20px;'>Follow</a>
	@endif
</p>

</div>