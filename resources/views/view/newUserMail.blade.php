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
    <h4> Welcome To Luxury Property Management</h4>
</div>
<div class="my-body">
    <p>Hello, {{ $name }}</p>
    <p> We are pleased to have you in our team</p>
    <p>
        Below is your basic logins credentials, once you login,
        please change your email and password.
    </p>
    <p>
        Email: {{ $email }}
        <br>
        Password: {{ $password }}
    </p>
</div>
</body>
</html>
