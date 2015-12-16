<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ url() }}/css/flat-ui.css">
	<link rel="stylesheet" type="text/css" href="{{ url() }}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ url() }}/css/main.css">
	<script src="{{ url() }}/js/jquery.js"></script>
	<script src="{{ url() }}/js/flat-ui.js"></script>

	@yield('head')
	<title>@yield('title')</title>


</head>
<body>

<div class="navbar-inverse" id="navbar-display" style="display:none">
	<div class="navbar-header">
		<a href="http://localhost:8000/" class="navbar-brand">ColorWorld</a>
	</div>
	<div class="navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="">Gallery</a></li>
			<li><a href="">Favorite</a></li>
			<li><a href="http://localhost:8000/feed/0">Feed</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			@if(Auth::check())
			<div class="btn-group" style="margin-top: 8px; margin-right: 10px">
				@if(Auth::User()->rank == 1)
					<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
				@else
					<button class="btn btn-inverse dropdown-toggle" type="button" data-toggle="dropdown">
				@endif
						{{Auth::User()->username}}
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-inverse" role="menu">
						<li><a href="http://localhost:8000/auth/profile">Profile</a> </li>
						@if(Auth::User()->rank== 1)
							<li><a href="http://localhost:8000/userinfo/0">User Infomation</a> </li>
						@endif
						<li><a href="{{url('/auth/logout')}}">Log Out</a> </li>
				</ul>
			</div>
			@else
				<li><a href="http://localhost:8000/auth/login">Sign in</a></li>
				<li><a href="http://localhost:8000/auth/register">Register</a></li>
			@endif
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