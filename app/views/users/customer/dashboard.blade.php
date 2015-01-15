@extends('layouts.master-with-sidebar')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Dashboard</span></li>
@stop
@section('content')


<div class="inner-wrapper">
	<h4>Hi {{$name}}</h4>
					<aside id="sidebar">
					
							<!-- BEGIN .widget -->
							<!--<div class="widget">
								<div class="wi-banner">
									<a href="#" target="_blank"><img src="images/no-banner-300x250.jpg" alt="" /></a>
								</div>-->
							<!-- END .widget -->
							
							<div class="widget">
								<h3>My Projects</h3>
                                <h4>&nbsp;&nbsp;On going</h4>
                                <h4>&nbsp;&nbsp;Closed</h4>
                                
                               
								<!--<ul>
									<li><a href="#">Worth A Thousand Words</a></li>
									<li><a href="#">Elements</a></li>
									<li><a href="#">More Tags</a></li>
									<li><a href="#">HTML</a></li>
									<li><a href="#">Links</a></li>
								</ul>-->
							<!-- BEGIN .widget -->
							</div>
					
							<!-- BEGIN .widget -->
							

						<!-- END #sidebar -->
						</aside>
						<!-- BEGIN .content-block -->
						<div class="content-block">
							<table class="table-customer-projects">
                            	<thead>
                                	<tr>
                                    	<th>#</th>
                                        <th>Project Title</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php $count = 0; ?>
                                	@if (!$projects->isEmpty())
                                		@foreach($projects as $project)
                                	<tr>
                                    	<td>{{$count++}}</td>
                                        <td>$project->title</td>
                                        <td>$project->created_at</td>
                                    </tr>
                                    	@endforeach
                                    @else
                                    <tr>
                                    	You have no projects
                                    <tr>
                                    @endif
                                    
                                </tbody>
                            </table>
							
							

						<!-- END .content-block -->
						</div>

						<!-- BEGIN #sidebar -->
						

					<!-- END .inner-wrapper -->
					</div>
										
@stop