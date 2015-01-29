@if (!$customerprojects->isEmpty())

	@foreach($customerprojects as $project)
		<!-- <div class=""> -->
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
				{{substr( $project->description,0,70)}} ...
				@if(Auth::user()->userable->customerprojects->contains($project->id))
				<a href="#" id = {{$project->id}}  class ='s-button right fol' style='margin-right:20px;'>Following</a>
				@else
					<a href="#" id = {{$project->id}}  class ='s-button right fol' style='margin-right:20px;'>Follow</a>
				@endif
			</p>
			
			</div>
	@endforeach

@else
<h2 align='center'>There are no {{strtolower($projectstatus)}} projects in this category</h2>
@endif
<script>
	$(function(){
		$(".project_details").on('click',function(e){
			e.preventDefault();
			projectdetails(e.target.id);
		});
		$(".fol").on('click',function(e){
            e.preventDefault();
            $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            ajaxLoader(e,-80,10);
            $.ajax({
                type: "GET",
                url : window.location.origin+ '/project/changestatus/'+ e.target.id,
                data : null,
                success : function(data){
                    console.log(data);
                    reload();
                }
            });
            return false;
        });
   
	});
</script>
<!-- {{ HTML::script('jscript/jquery-1.10.2.min.js')}} -->

