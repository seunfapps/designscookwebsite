@extends('layouts.master-with-sidebar')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Dashboard</span></li>
@stop
@section('content')
<div class="inner-wrapper">
	<h4>Hi {{$name}}</h4>
	<aside id="sidebar">
		<div class="widget">
			<h3>My Projects</h3>
            <h4>&nbsp;&nbsp;On going</h4>
            <h4>&nbsp;&nbsp;Closed</h4>
		<!-- BEGIN .widget -->
		</div>

		<!-- BEGIN .widget -->
		

	<!-- END #sidebar -->
	</aside>
	<!-- BEGIN .content-block -->
	<div class="content-block">
		<?php $count = 0; ?>
        @if (!$projects->isEmpty())
			<table class="table-customer-projects">
	        	<thead>
	            	<tr>
	                	<th>#</th>
	                    <th>Project Title</th>
	                    <th>Date</th>
	                </tr>
	            </thead>
	            <tbody>
	            	
	            		@foreach($projects as $project)
	            	<tr>
	                	<td>{{$count++}}</td>
	                    <td>{{$project->title}}</td>
	                    <td>{{$project->created_at}}</td>
	                </tr>
	                	@endforeach
	            </tbody>
	        </table>
         @else
			<div>You have no projects</div>
		 @endif

	<!-- END .inner-wrapper -->
	</div>
@stop