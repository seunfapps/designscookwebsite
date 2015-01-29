<div class="block-title" align="center"><h2>Update Profile</h2></div>
    <div class="dat-scrollnimate center" data-animation="bounceIn">
        <div class="size4" >
			<div  align="center">
				 <!-- <form id='updateprofile'> -->
            {{ Form::model($user,array('id'=>'updateprofile')) }}	

					@if ($errors->any())
					{{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
					@endif	
					{{Form::text('firstname', Input::old('firstname'), ['placeholder'=>'First Name', 'class'=>'input-text', 'required'=>'true'])}}{{Form::text('lastname', Input::old('lastname'), ['placeholder'=>'Last Name', 'class'=>'input-text'])}}<br>
					{{Form::text('email', Input::old('email'), ['placeholder'=>'Email', 'disabled'=>'true','class'=>'input-text', 'required'=>'true'])}} {{Form::text('company',  Input::old('company'), ['placeholder'=>'Company', 'class'=>'input-text'])}}<br>
					{{Form::text('phone', Input::old('phone'), ['placeholder'=>'Phone Number', 'class'=>'input-text'])}}{{Form::text('country',  Input::old('country'), ['placeholder'=>'Country', 'class'=>'input-text'])}}<br>
					{{Form::submit('Update', ['class'=>'input-text'])}}<br>

                <!-- </form> -->
            {{Form::close()}}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function(){
        
         
   $("#updateprofile").submit(function(e){
   	 	e.preventDefault();
         e.stopPropagation();
         updateprofile();
    });
    });

</script>
