@extends('layouts.menu')
@section('title')Color World @stop
@section('content')
	<div class="topstrip">
	<header class="mainheader">
		      	<a href="http://localhost:8000"><img src="./images/cwl2.png" class="logo"></a>
                <nav>
                	<ul>
                    	<li><a href=""><p>Gallery</p><p>the beautiful world</p></a></li>
                        <li><a href=""><p>Favorite</p><p>the best moment of</p></a></li>
                        <li><a href="http://localhost:8000/feed/0"><p>Feed</p><p>your life .</p></a></li>
                    </ul>
                </nav>
                <h1>Sharing photos and life style.</h1>
                <h2>Save your best moments of your life as often as you can,one day its gonna be your most precious things.
					@if(Auth::check())
						Let's do it Now.
					@else
						<a href="http://localhost:8000/auth/login">Log in</a> or <a href="http://localhost:8000/auth/register">Join us now</a> to start sharing
					@endif
				</h2>
	</header>

	</div>
	<div class="aboutUs">
		<div class="allAbout">
			<section class="textcontent">
			<h1>About Us</h1>
			<p>Bach Khoa University Of Science And Technology<br>
			Nguyen Ngoc Hung - 20121867<br>
				Vu Dang Khoi - 20121930<br>
				Tran Danh Ha - 20121626<br>
				Tran Cong Khanh - 20121902
			</p>
			</section>
		</div>
		<div><p>.</p></div>

	</div>
	<script src="./js/jquery.js"></script>

	<script type="text/javascript">

	$(window).scroll(function(){
	  if($(window).scrollTop() > 740){
	      $("#navbar-inverse").slideDown("fast");
	      document.getElementById('navbar-display').style.display = 'block';

	  }
	});
	$(window).scroll(function(){
	  if($(window).scrollTop() < 740){
	      $("#navbar-inverse").slideUp("fast");
	      document.getElementById('navbar-display').style.display = 'none';
	  }
	});
	</script>
@stop