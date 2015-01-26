@extends('layouts.master-with-sidebar')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Dashboard</span></li>
@stop
@section('content')


<div class="inner-wrapper">
    <aside id="sidebar">
        
    	<div class="widget accordion">
    		<div class="accordion-tab active"><a href="#projects"></a><h3 ><a class='projects' href="#">My Projects</a></h3>
        		<div class="accordion-block">
            	    <h4>&nbsp;&nbsp;<a id='open' class='projects' href="#">Open</a></h4>
            	    <h4>&nbsp;&nbsp;<a id='closed' class='projects' href="#">Closed</a></h4>
        	    </div>
    	    </div>
            
    	    
    		<div class="accordion-tab active"><a href="#profile"></a><h3 ><a href="#" class='profile'>My Profile</a></h3>
    	    	<div class="accordion-block">
    	    		<h4>&nbsp;&nbsp;<a href="#" class='profile'>Update Profile</a></h4>
    	    		<h4>&nbsp;&nbsp;<a href="#" class='changepassword' >Change Password</a></h4>
    	    	</div>
    	    </div>

    	</div>
    <!-- END #sidebar -->
    </aside>
    	<!-- BEGIN .content-block -->

    <div class="content-block" >  
        <div id="waitImageSidebar" style="display:none;"><img src="{{ asset('images/ajax-loader.gif') }}" alt="Please wait..." title="Please wait..."  />Loading</div>
        <div id="projects" >
            <div class="margin-bottom-10px" >
                <span >Category</span> {{Form::select('category',$categories,'',['id'=>'category', 'onChange'=>'reload(this);'])}}
            </div>
            <div id="result"></div>
        </div>
        <div id="profile" style="display:none;">
        </div>
    	<!-- END .content-block -->
    </div>
    	

<!-- END .inner-wrapper -->
</div>

{{ HTML::script('jscript/jquery-1.10.2.min.js')}}
<script type="text/javascript">
    var currenttab = '{{$currenttab}}';    
    var elem = $('.content-block>div');
    var status = '';

    $(function(){
        
        $(".changepassword").on('click',function(e){
            ajaxLoader(e,150,0);
            hideContent();
            $('#profile').load(window.location.origin+ '/user/changepassword', " #profile"); 
            window.history.pushState(null,"", window.location.origin + "/customer/dashboard/changepassword");
            $('#profile').show();
            return false;
        }); 

        $(".profile").on('click',function(e){
            ajaxLoader(e,150,0);
            hideContent();
            $('#profile').load(window.location.origin+ '/user/profile', " #profile"); 
            window.history.pushState(null,"", window.location.origin +"/customer/dashboard/profile");
            $('#profile').show();
            return false;
        });
        
        $(".projects").on('click',function(e){
            ajaxLoader(e,150,0);
            status = e.target.id;
            reload();
            return false;
        });

      
        hideContent(elem);
        loadtab(currenttab);
        //document.getElementById(currenttab).style.display = "block";


    });
    function updateprofile(e){
            e.preventDefault();
             e.stopPropagation();
             var inputs = $("#updateprofile").serializeArray();
               $.ajax({
                    type: "POST",
                    url : window.location.origin+ '/customer/updateprofile/',
                    data : inputs,
                    success : function(data){
                        console.log(data);
                        $("#profile").html(data);
                    }
                });
             //$('#profile').load(window.location.origin+ '/user/changepassword/'+oldpassword+'/'+newpassword, " #profile"); 
             return false;
        }
    function hideContent(){
        $.each($(elem),function(i,val)
        {
            val.style.display = "none";
        });
    }

    function ajaxLoader(e, left,top){
            e.preventDefault();
            document.getElementById('waitImageSidebar').style.position = "absolute";
            document.getElementById('waitImageSidebar').style.left = ($(e.target).offset().left+left )+ "px";
            document.getElementById('waitImageSidebar').style.top = ($(e.target).offset().top+top) + "px";
             $(document).ajaxStart(function () {
                $("#waitImageSidebar").show();
            }).ajaxStop(function () {
                $("#waitImageSidebar").hide();
            });
    }

    function loadtab(tabname){
        $($('.'+tabname)[0]).trigger('click');
    }
    function reload(){
        hideContent();
        cat = $('#category').val();
        $('#result').load(window.location.origin+ '/customer/projects/'+cat+'/'+ status, " #projects");
        window.history.pushState(null,"", window.location.origin+"/customer/dashboard/projects");
        $('#projects').show();
    }
    // function processAjaxData(response, urlPath){
    //     document.getElementById("content").innerHTML = response.html;
    //     document.title = response.pageTitle;
    //     window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
    // }

    
</script>
				
@stop

