 function ajaxLoader(e, left,top){
            e.preventDefault();
            document.getElementById('waitImage').style.position = "absolute";
            document.getElementById('waitImage').style.left = ($(e.target).offset().left+left )+ "px";
            document.getElementById('waitImage').style.top = ($(e.target).offset().top+top) + "px";
             $(document).ajaxStart(function () {
                $("#waitImage").show();
            }).ajaxStop(function () {
                $("#waitImage").hide();
            });
    }

$(document).ready(function () {
   
   
    $("#upload").bind('change',function(){
        size = 15728640;
        if(this.files[0].size > size){
            this.value = null;
            alert("The file is too large");
        }
    });

   $(".delete").bind('click',function (e) {
        e.preventDefault();
        $.ajax({
                type: "POST",
                url : e.target.href,
                data : null,
                success : function(data){
                    console.log(data);
                    location.reload();
                }
            });
   });

   
    //  $('#updatepassword').on('click',function(e){
    //      e.preventDefault();
    //      var oldpassword = $('#oldPassword').val();
    //      var newpassword = $('#newPassword').val();
    //      $('#profile').load(window.location.origin+ '/user/changepassword/'+oldpassword+'/'+newpassword, " #profile"); 

    // });

	 
});
