@extends('layouts.master')
@section('pagetree')
<li><a href="index.html">Homepage</a></li>
<li><span>Login</span></li>
@stop
@section('content')
<div class="inner-wrapper">
    
        <div class="block-title"><h2>Pick A Category</h2></div>
        <div id="categories">
        	<div class="split">
        		<div class="panel-block size3">
                	<h3>Corporate</h3> 	
                  <!--  <table class="table">
                    	<tr><td>Logo</td></tr>
                        <tr><td>Business Card</td></tr>
                        <tr><td>Letter Head</td></tr>
                        <tr><td>Name Tag</td></tr>
                    </table>-->
                    <ul>
                    	<li>Logo</li>
                        <li>Business Card</li>
                        <li>Letter Head</li>
                        <li>Name Tag</li>
                        <li>Signage</li>
                        <li>T-Shirt</li>
                    </ul>
         		</div>
            	<div class="panel-block size8">
                	<h3>Print</h3> 	
                    <div class="split">
                    	<div style="float:left;" class="size6">
                        	<ul>
                            	<li>Advertisement</li>
                                <li>Book Cover</li>
                                <li>Brochure</li>
                                <li>Calendar</li>
                                <li>Card</li>
                                <li>CD Cover</li>
                            </ul>
                        </div>
                        <div style="float:left;" class="size6">
                        	<ul>
                            	<li>Envelope</li>
                                <li>Flyer</li>
                                <li>Invitation</li>
                                <li>Magazine</li>
                                <li>Menu</li>
                                <li>Poster</li>
                            </ul>
                        </div>
                        <div style="clear:both"></div>
                    </div>
         		</div>
       		</div>
            
            <div class="split">
        		<div class="panel-block size5">
                	<h3>Web</h3> 	
                    <ul>
                    	<li>Web Page</li>
                        <li>Banner Ad</li>
                        <li>Blog</li>
                        <li>Icon</li>
                        <li>Newsletter</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Wordpress</li>
                    </ul>
         		</div>
            	<div class="panel-block size6">
                	<h3>Graphics</h3> 	
                    <ul>
                    	<li>Graphic</li>
                        <li>Art</li>
                        <li>3D</li>
                        <li>Illustration</li>
                        <li>Photoshop</li>
                        <li>PowerPoint</li>
                        <li>Vector</li>
                    </ul>
         		</div>
               
       		</div>
        </div>
            
</div>
@stop