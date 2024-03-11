<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="{{asset("vendor")}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Message</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Resting <span style="color:red;">Clothes</span></h1>
        <h2>Name: {{$data["name"]}}</h2>
        <h3>Email: {{$data["email"]}}</h3>
        <h3>Subject :{{$data["subject"]}}</h3>
        <p>Subject :{{$data["body"]}}</p>
        <hr>
        <p>Thank You.</p>
    </div>
</body>
</html>