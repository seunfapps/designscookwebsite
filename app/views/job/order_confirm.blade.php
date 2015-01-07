@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li>{{HTML::link('job/post', 'Post a job')}}</li>
<li>{{HTML::link('job/details/'.$id , 'Post a job')}}</li>
<li><span>Confirm Order</span></li>
@stop
@section('content')

    <div class="block-title"><h2>Confirm Order</h2></div>
    	
    	<div class="comment-form">
			               
			<p class="form-info" style="font-size:24px;">Buy T-Shirt Design Price for N5000?</p>
           <div style="display:inline-block; margin-left:25%;" >
           
			<!--<p class="form-submit" style="float:left; margin-right:5px;">-->
				
                <input type="submit" value="Back" />
			<!--</p>-->
           <!-- <p class="form-submit">-->
					<input type="submit" value="Proceed" />
			<!--</p>-->
            </div>
		</div>    
            

@stop