@extends('layouts.master-with-sidebar')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Dashboard</span></li>
@stop
@section('content')


<div class="inner-wrapper">
<aside id="sidebar">
	<div class="widget accordion">
		<div class="accordion-tab active"><a href="#"><h3 >Projects</h3></a>
		<div class="accordion-block">
	    <h4>&nbsp;&nbsp;<a id='open' class='status' href="?status=open">Open</a></h4>
	    <h4>&nbsp;&nbsp;<a id='closed' class='status' href="#">Closed</a></h4>
	    </div>
	    </div>
	    @if (!$categories->isEmpty())
	    <div class="accordion-tab"><a href="#"><h3 >Categories</h3></a>
	    	<div class="accordion-block">
			@foreach($categories as $category)
				<h4>&nbsp;&nbsp;{{$category->name}}</h4>
	  	 	@endforeach
	  	 	</div>
	  	</div>
		@endif 
		<div class="accordion-tab"><a href="#"><h3 >My Profile</h3></a>
	    	<div class="accordion-block">
	    		<h4>&nbsp;&nbsp;<a href="#">Update Profile</a></h4>
	    		<h4>&nbsp;&nbsp;<a href="#">Change Password</a></h4>
	    	</div>
	    </div>

	</div>
<!-- END #sidebar -->
</aside>
	<!-- BEGIN .content-block -->
	<div class="content-block">
		{{$child}}
		
	<!-- END .content-block -->
	</div>
	

<!-- END .inner-wrapper -->
</div>
	{{ HTML::script('jscript/jquery-1.10.2.min.js')}}

	<script>
        $("document").ready(function(){
            $(".status").on('click',function(e){
                e.preventDefault();


               	$.ajaxSetup({
   					headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
				});
                $.ajax({
                    type: "POST",
                    url : window.location.origin+ '/user/projects/'+ e.target.id,
                    data : null,
                    success : function(data){
                    	if(data == ""){
                    		data = "<h2 align='center'>There are no "+e.target.id+" project</h2>";
                    	}
                    	$('.content-block').replaceWith('<div class="content-block">'+data+'</div>');
                        console.log(data);
                    }
                });

        });
        });//end of document ready function
    </script>						
@stop