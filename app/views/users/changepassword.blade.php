<div class="block-title" align="center"><h2>Change Password</h2></div>
    <div class="dat-scrollnimate center" data-animation="bounceIn">
        <div class="size4" >
			<div  align="center">
				 {{ Form::open(array('id'=>'updatepassword')) }}  
                                
                    @if ($errors->any())
                            {{ implode('', $errors->all('<div class="woocommerce-error">:message</div>')) }}
                    @endif  
                    <div class="margin-bottom-10px">
                        {{Form::password('old_password',['placeholder'=>'Old Password','id'=>'old_Password', 'type'=>'password', 'class'=>'input-text', 'required'=>'true'])}}
                    </div>
                    <div class="margin-bottom-10px">
                        {{Form::password('new_password',['placeholder'=>'New Password', 'type'=>'password', 'id'=>'new_Password', 'class'=>'input-text', 'required'=>'true'])}}
                    </div>
                    <div class="margin-bottom-10px">
                        {{Form::password('new_password_confirmation',['placeholder'=>'Confirm Password', 'type'=>'password','id'=>'new_Password_confirmation' ,'class'=>'input-text', 'required'=>'true'])}}
                    </div>
                    {{Form::submit('Update Password')}}<br>
          {{Form::close()}}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function(){
        var newPassword = document.getElementById("new_Password")
        , confirmPassword = document.getElementById("new_Password_confirmation");

        function validatePassword(){
          if(newPassword.value != confirmPassword.value) {
            confirmPassword.setCustomValidity("Passwords Don't Match");
          } else {
            confirmPassword.setCustomValidity('');
          }
        }

        newPassword.onchange = validatePassword;
        confirmPassword.onkeyup = validatePassword;

         
   $("#updatepassword").submit(function(e){
         e.preventDefault();
         e.stopPropagation();
         var inputs = $("#updatepassword").serializeArray();         
         
           $.ajax({
                type: "post",
                url : window.location.origin+ '/user/changepassword',
                data : inputs,
                success : function(data){
                    console.log(data);
                    $("#profile").html(data);
                }
            });
         //$('#profile').load(window.location.origin+ '/user/changepassword/'+oldpassword+'/'+newpassword, " #profile"); 
         return false;
    });
    });

</script>