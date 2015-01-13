@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('job/post', 'Post a job')}}</li>
<li>{{HTML::link('job/brief/'.$job_details['subcategory_id' ], 'Job brief')}}</li>
<li><span>Job Details</span></li>
@stop
@section('content')

    <div class="block-title"><h2>Job Details</h2></div>
    	<div class="comment-form">
        {{Form::open(array('action'=>'JobRequestsController@store'))}}
		    <p class="form-name">
            	<label for="">Job Title</label>
            </p>
            <p class="form-comment">
            	{{$job_details['title']}}            
            </p>
            <p class="form-name">
            <label for="">Design Name</label>
            </p>
            <p class="form-comment">
            	{{$job_details ['design_name']}}            
            </p>
            <p class="form-name">
            <label for="">Design Category</label>
            </p>
            <p class="form-comment">
            	{{$job_details ['category']}}            
            </p>
            <p class="form-name">
            <label for="">Cost</label>
            </p>
            <p class="form-comment">
            	{{$job_details ['cost']}}            
            </p>
            <p class="form-submit">
                {{Form::submit('Proceed to payment')}}                        
            </p>

            {{Form::close()}}
            <input type='button' id='proceed' value='Proceed'>
            <button class="btn btn-primary btn-large" data-toggle="modal" href="#responsive">View Demo</button>
            <div id="dialog"></div> 
        </div>
	</div>    

{{ HTML::script('jscript/jquery-1.10.2.min.js')}}
{{ HTML::script('jscript/jquery-ui-1.8.20.min.js')}}
{{ HTML::script('jscript/bootstrap.min.js')}}
{{ HTML::script('jscript/bootstrap-modalmanager.js')}}
{{ HTML::script('jscript/bootstrap-modal.js')}}
{{ HTML::script('jscript/bootstrap.min.js')}}
{{ HTML::script('jscript/bootstrap.min.js')}}

 {{ HTML::style('css/bootstrap-modal-bs3patch.css') }}
     {{ HTML::style('css/bootstrap-modal.css') }}
     {{ HTML::style('css/bootstrap-responsive.css') }}
     {{ HTML::style('css/bootstrap.css') }}
     {{ HTML::style('css/theme-style.css') }}
     {{ HTML::style('css/shortcodes.css') }}
     {{ HTML::style('css/responsive.css') }}

<div id="responsive" class="modal hide fade" tabindex="-1" data-width="760">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Responsive</h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span6">
        <h4>Some Input</h4>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
      </div>
      <div class="span6">
        <h4>Some More Input</h4>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
        <p><input type="text" class="span12" /></p>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>

<script >

$(function () {
    iframe = $('<iframe id="myframe" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>');
    $('#dialog').append(iframe).dialog({
        autoOpen: false,
        modal: true,
        resizable: false,
        width: "auto",
        height: "auto",
        // close: function () {
        //       iframe.attr("src", "");
        //  },
        // buttons: {
        //     "Select": function (e) {
        //         var id = $("#dialog").data('opener').id;

        //         var childwindow = document.getElementById("myframe").contentWindow;
        //         var oTable = $("#myDataTable", childwindow.document).dataTable();
        //         var anSelected = childwindow.fnGetSelected(oTable);
        //         if (anSelected.length !== 0) {
        //             var customerid = oTable.dataTable().fnGetData(anSelected[0])[0];
        //             switch (id) {
        //                 case "customer":
        //                     {
        //                     }
        //                 case "user":
        //                     {
        //                         $(document.getElementById('Username')).val(customerid);
        //                         break;
        //                     }

        //             }
        //             closeDialog();
        //         }
        //         else { alert("Please select a row on the table"); }
            // }
        // }
    });
    $("#proceed").on("click", function (e) {
        e.preventDefault();
        var src = $(this).attr("href");
        var title = $(this).attr("data-title");
        var width = $(this).attr("data-width");
        var height = $(this).attr("data-height");
        iframe.attr({
            width: +width,
            height: +height,
            src: src
        });
        $("#dialog").data('opener', this).dialog("option", "title", title).dialog("open");
    });
});


</script>

@stop