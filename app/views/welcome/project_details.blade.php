@extends('layouts.master')
@section('pagetree')
<li><a href="index.html">Homepage</a></li>
<li><span>Login</span></li>
@stop
@section('content')
<div class="inner-wrapper">
    <div class="block-title"><h2>Project Details</h2></div>
    	
    	<div class="comment-form">
			               
			<p class="form-info" style="font-size:24px;">T-Shirt Design Price : N5000</p>
            <!--<p class="form-info">Tell us about the work you want done</p>-->
			<p class="form-name">
			<label for="">Title<span class="required">*</span></label>
			<input type="text" placeholder="Project Title" />
			</p>
            <p class="form-comment">
			<label for="">Description<span class="required">*</span></label>
			<textarea placeholder="Some information that may come in handy for designers"></textarea>
			</p>
			<p class="form-name">
			<label for="">File<span class="required"></span></label>
			<input type="file" placeholder="(Optional)" style="margin-left:29%" />
			</p>
			<!--<p class="form-website">
				<label for="">:</label>
				<input type="text" placeholder="Website" />
			</p>
			<p class="form-comment">
				<label for="">Comment:<span class="required">*</span></label>
				<textarea placeholder="Comment text"></textarea>
			</p>-->
			<p class="form-submit">
				<input type="submit" value="Proceed" />
			</p>
		</div>    
            
</div>
@stop