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
    .added-text{
        background-color: #a0aec0;
    }
</style>

<div class="header">
    <h4> A Client has raised a new issue </h4>
</div>
<div class="my-body">

    <h4><b>Issue Code: </b> {{ $issue_number }} </h4>
    <h4><b>Tenant: </b> {{ $tenant }}</h4>
    <h4><b>Apartment: </b> {{ $unit_name }}</h4>

    <p>
        {{ $issue_body }}

    </p>

    <p class="added-text">
        You are required to handle this issue within a period of six (6)
        hours after which it would be forwarded to Administration
    <p>

    </p>
</div>
</body>
</html>
