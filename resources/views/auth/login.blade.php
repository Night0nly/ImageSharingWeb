
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Login Page</title>

	<link rel="stylesheet" type="text/css" href="{{url()}}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{url()}}/css/flat-ui.css">
	<link rel="stylesheet" type="text/css" href="{{url()}}/css/login.css">
	

	<style>

	</style>
	
</head>
<body>
@if(count($errors)>0)
	<div class="errMes">
		<p>{{count($errors)}} Error:
			@foreach($errors->all() as $error)
				{{$error}}.
			@endforeach
		</p>
	</div>
@endif
	<div class = "box">
		<a href="http://localhost:8000/test" ><img src="{{ url() }}/images/cwl2.png" height="65px" style="margin-bottom: 25px"></a>
		<form action="{{url()}}/auth/login" method="POST">
			{!!csrf_field()!!}
			<div class="form-group">
				<input type="text" placeholder="Email" name="email" class="form-control input-lg" />
			</div>
			<input style="margin-bottom: 20px;" type="password" placeholder="Password" name="password" class="form-control input-lg" />
			<button type="submit" class="btn btn-info btn-wide">Login</button>
		</form>
		<div class ="remoteLine">
		<a href="http://localhost:8000/auth/register">Sign up</a>
		<label>     </label>
		 <a href="http://localhost:8000/test">Main page</a>
		</div>
	</div>
</body>
</html>