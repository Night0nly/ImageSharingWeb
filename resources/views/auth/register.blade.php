@include('shared.errors_message')

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sign Up</title>

    <link rel="stylesheet" type="text/css" href="{{url()}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/css/flat-ui.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/css/login.css">


    <style>

    </style>

</head>
<body>
<div class = "box" style="margin-top: 3%">
    <a href="http://localhost:8000/test" ><img src="{{ url() }}/images/cwl2.png" height="65px" style="margin-bottom: 25px"></a>
    <form method="POST" action="{{ url() }}/auth/register">
        {!!csrf_field()!!}
        <div class="form-group">
            <input type="text" placeholder="Username" name="username" class="form-control input-lg" />
        </div>
        <input style="margin-bottom: 20px;" type="password" placeholder="Password" name="password" class="form-control input-lg" />
        <input style="margin-bottom: 20px;" type="password" placeholder="Confirmation Password" name="password_confirmation" class="form-control input-lg" />
        <input style="margin-bottom: 20px;" type="text" placeholder="Your Name" name="name" class="form-control input-lg" />
        <input style="margin-bottom: 20px;" type="email" placeholder="Your Email" name="email" class="form-control input-lg" />
        <button type="submit" class="btn btn-info btn-wide">Sign Up</button>

    </form>
    </div>
</div>
</body>
</html>