<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <br/>
        Please click link below to change the password
    <br/>
    <a href="http://127.0.0.1:8000/user/forget-password/{{$user->remember_token}}">Change Password Link</a>
  </body>
</html>