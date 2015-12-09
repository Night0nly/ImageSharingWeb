<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>

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
	<div class = "box">
		<form action="{{url()}}/auth/login" method="POST">
			{!!csrf_field()!!}
			<div class="form-group">
				<input type="text" placeholder="Username" name="username" class="form-control input-lg" />
			</div>
			<input style="margin-bottom: 20px;" type="password" placeholder="Password" name="password" class="form-control input-lg" />
			<button type="submit" class="btn btn-info btn-wide">Login</button>
		</form>
		<div class ="remoteLine">
		<a href="">Sign up</a>
		<label>     </label>
		 <a href="">Main page</a>
		</div>
	</div>
</body>
</html>