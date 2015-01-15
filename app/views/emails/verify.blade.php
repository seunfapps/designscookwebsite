<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Hi {{$name}},<br><br>

            Thanks for creating an account with DesignsCook.
            Please click on:<br><br>
            {{ URL::to('register/verify', array($token)) }}<br><br>
            to confirm your account.<br><br>

            Yours sincerely,<br>
            The DesignsCook team<br>
        </div>

    </body>
</html>