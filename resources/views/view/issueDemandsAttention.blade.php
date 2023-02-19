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
    <h4> An Issue has Overstayed the set time Limit </h4>
</div>
<div class="my-body">



    <p>
        An issue has stayed more than 6 hours without being resolved.
        This immediately calls for your attention as the general Administrator,
        below are the issue details
    </p>

    <h4><b>Issue Code: </b> {{ $issue_number }} </h4>
    <h4><b>Tenant: </b> {{ $tenant }}</h4>
    <h4><b>Apartment: </b> {{ $unit_name }}</h4>
    <h4><b>Real Estate Project: </b> {{ $project }}</h4>

    <p>
        {{ $issue_body }}
    </p>
</div>
</body>
</html>
