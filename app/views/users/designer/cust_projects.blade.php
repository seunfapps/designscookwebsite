	@if (!$projects->isEmpty())

<div class="accordion">
		@foreach($projects as $project)
			<!-- <div class=""> -->
				<div class="panel-block accordion-tab">
					<a href="#">
					<div class="article-header">
						<h1>{{$project->title}}</h1>{{HTML::link('#','Follow',['class'=>'s-button right','style'=>'margin-right:20px;'])}}
						<div class="theicoon">
							<a href="#"><i class="fa fa-user"></i><span>{{$project->customer->user->name}}<i>Author of the Project</i></span></a>
							<a href="#"><i class="fa fa-users"></i><span><?php if($project->designers_by_id == ''){
								echo '0';
							} else{$designers_id = explode(',',trim($project->designers_by_id));
							echo count($designers_id);}
							?> Entries<i>Designers Interested</i></span></a>
							<a href="#"><i class="fa fa-calendar-o"></i><span>{{$project->created_at}}<i>Date when project was submitted</i></span></a>
						</div>
					</div>
					</a>
				<div class="accordion-block">						
				<p >
					{{$project->description}}
				</p>
				
				</div>
				</div>
		@endforeach
</div>
    @endif
			