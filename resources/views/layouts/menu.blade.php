<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/flat-ui.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">

	<title>@yield('title')</title>

</head>
<body>

<div class="navbar-inverse" id="navbar-display" style="display:none">
	<div class="navbar-header">
		<a href="" class="navbar-brand">ColorWorld</a>
	</div>
	<div class="navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="">Home</a></li>
			<li><a href="">Gallery</a></li>
			<li><a href="">Favorite</a></li>
			<li><a href="">Feed</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="">Sign in</a></li>
			<li><a href="">Register</a></li>
		</ul>
		<form role="search" class="navbar-form navbar-right">
			<div class="form-group">
				<input type="text" placeholder="Search" class="form-control">
			</div>
			<button class="btn btn-default" type="submit">Submit</button>
		</form>

	</div>
</div>
@yield('content')

</body>

</html>