<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        
        <div>
            Hi {{$name}}, <br><br>

            The password for your DesignsCook Account - {{$email}}- was recently changed. <br><br>
			If you made this change, you don't need to do anything more. <br><br>

			If you didn't change your password, your account might have been hijacked. To get back into your account, you'll need to reset your password. <br><br>

			{{URL::to('password/remindemail',array($email))}} <br><br>

			Yours sincerely, <br>
			The DesignsCook team<br>

        </div>

    </body>
</html>