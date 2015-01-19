@extends('layouts.master-with-sidebar')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Dashboard</span></li>
@stop
@section('content')


<div class="inner-wrapper">
		<aside id="sidebar">
		
				<!-- BEGIN .widget -->
				<!--<div class="widget">
					<div class="wi-banner">
						<a href="#" target="_blank"><img src="images/no-banner-300x250.jpg" alt="" /></a>
					</div>-->
				<!-- END .widget -->
			
				<div class="widget">
					<h3>Projects</h3>
                    <h4>&nbsp;&nbsp;On going</h4>
                    <h4>&nbsp;&nbsp;Closed</h4>
                    
                    <h3>Categories</h3>
                    @if (!$categories->isEmpty())
    					@foreach($categories as $category)
    						<h4>&nbsp;&nbsp;{{$category->name}}</h4>
                  	 	@endforeach
					@endif 
				<!-- BEGIN .widget -->
				</div>
		
				<!-- BEGIN .widget -->
				

			<!-- END #sidebar -->
			</aside>
			<!-- BEGIN .content-block -->
			<div class="content-block">
				@if (!$projects->isEmpty())
					@foreach($projects as $project)
						<div class="panel-block">
							
							<div class="article-header">
								<h1>{{$project->title}}</h1>
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
						
							<p>
								{{$project->description}}
							</p>
							{{HTML::link('#','Follow',['class'=>'s-button right','style'=>'margin-right:20px;'])}}
						</div>
				
					@endforeach
                @endif

			<!-- END .content-block -->
			</div>

		<!-- END .inner-wrapper -->
		</div>
							
@stop