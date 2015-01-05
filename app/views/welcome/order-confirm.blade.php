@extends('layouts.master')
@section('pagetree')
<li><a href="index.html">Homepage</a></li>
<li><span>Login</span></li>
@stop
@section('content')
<div class="inner-wrapper">
    <div class="block-title"><h2>Confirm Order</h2></div>
    	
    	<div class="comment-form">
			               
			<p class="form-info" style="font-size:24px;">Buy T-Shirt Design Price for N5000?</p>
           
			<p class="form-submit">
				<input type="submit" value="Proceed" />
			</p>
            <p class="form-submit">
				<input type="submit" value="Back" />
			</p>
		</div>    
            
</div>
@stop