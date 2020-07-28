<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

    </head>
    <body>
        <div class="container">
            <form action='register' method="post" action="">
                <div id="div_login">
                    <h1>Register User</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="text" class="textbox" id="txt_email" name="txt_email" placeholder="Email"/>
                    </div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>

                </div>
                @csrf
            </form>
        </div>
    </body>
</html>
