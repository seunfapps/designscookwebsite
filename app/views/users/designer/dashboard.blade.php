@extends('layouts.master-with-sidebar')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Dashboard</span></li>
@stop
@section('content')


<div class="inner-wrapper">
<aside id="sidebar">
    
	<div class="widget accordion">
		<div class="accordion-tab active"><a href="#"></a><h3 ><a class='status' href="#">Projects</a></h3>
    		<div class="accordion-block">
        	    <h4>&nbsp;&nbsp;<a id='open' class='status' href="#">Open</a></h4>
        	    <h4>&nbsp;&nbsp;<a id='closed' class='status' href="#">Closed</a></h4>
    	    </div>
	    </div>
        
	    
		<div class="accordion-tab"><a href="#"></a><h3 ><a href="#">My Profile</a></h3>
	    	<div class="accordion-block">
	    		<h4>&nbsp;&nbsp;<a href="#">Update Profile</a></h4>
	    		<h4>&nbsp;&nbsp;<a href="#">Change Password</a></h4>
	    	</div>
	    </div>

	</div>
<!-- END #sidebar -->
</aside>
	<!-- BEGIN .content-block -->

	<div class="content-block" >
    <div class="margin-bottom-10px" >
       <span >Category</span> {{Form::select('category',$categories,'',['id'=>'category', 'onChange'=>'reload(this);'])}}

    </div>
    <div class="clear-float"></div>
    <div id="waitImageSidebar" style="display:none;"><img src="{{ asset('images/ajax-loader.gif') }}" alt="Please wait..." title="Please wait..."  />Loading</div>
    <div id="result" >{{$child}}</div>
        
		
	<!-- END .content-block -->
	</div>
	

<!-- END .inner-wrapper -->
</div>
	{{ HTML::script('jscript/jquery-1.10.2.min.js')}}

	<script>
        var status = '';
        $(function(){
            $(".status").on('click',function(e){
                e.preventDefault();
                document.getElementById('waitImageSidebar').style.position = "absolute";
                document.getElementById('waitImageSidebar').style.left = $(e.target).offset().left+100 + "px";
                document.getElementById('waitImageSidebar').style.top = $(e.target).offset().top + "px";
                 $(document).ajaxStart(function () {
                    $("#result").hide();
                    $("#waitImageSidebar").show();
                }).ajaxStop(function () {
                    $("#waitImageSidebar").hide();
                    $("#result").show();
                });
                status = e.target.id;
                reload();
                return false;
            });
        });
        function reload(){
                cat = $('#category').val();
                $('#result').load(window.location.origin+ '/designer/projects/'+cat.toString()+'/'+ status.toString(), " #result");
        }
    </script>						
@stop