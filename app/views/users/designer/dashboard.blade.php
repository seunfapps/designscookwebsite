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
							<div class="comments-block">
								
								<!-- BEGIN #comments -->
								<ol id="comments">
									@if (!$jobs->isEmpty())
										@foreach($jobs as $job)
									<li>
										<!--<div class="comment-inner">-->
											<div class="comment-content">
												<div class="comment-header">
													<h3><a href="#">{{$job->title}}</a></h3>
													<span class="comment-date">{{$job->created_at}}</span>
												</div>
                                                <div>
													<p><span>{{$job->description}}</span>
                                                	<a href="" class="s-button right" style="margin-right:20px;">Apply</a></p>
                                                </div>
											</div>
										<!--</div>-->
									</li>
										@endforeach
		                            @endif
								<!-- END #comments -->
								</ol>

							</div>
							
							

						<!-- END .content-block -->
						</div>

						<!-- BEGIN #sidebar -->
						

					<!-- END .inner-wrapper -->
					</div>
										
@stop