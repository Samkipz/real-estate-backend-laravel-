<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    .header{
        background: beige;
        padding: 5px;
        display: flex;
        justify-content: center;
    }
    .my-body{
        margin-top: 10px;
        background-color: #edf2f7;
        padding: 5px;
        border-radius: 5px;
    }
</style>

<div class="header">
    <h4> Password Reset Link </h4>
</div>
<div class="my-body">
    <p>Hello</p>
    <p> This email is a confirmation of the requested link to reset your account password</p>
    <p>
        You can reset password from bellow link:
        <a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
    </p>

    <p>
        If you did not initiate this action, please ignore
    </p>
</div>
</body>
</html>
