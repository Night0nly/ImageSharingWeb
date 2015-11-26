@extends('layouts.menu')
@section('title')Color World @stop
@section('content')
	<div class="topstrip">
	<header class="mainheader">
		      	<a href="#"><img src="./images/cwl2.png" class="logo"></a>
                <nav>
                	<ul>
                    	<li><a href=""><p>Gallery</p><p>the beautiful world</p></a></li>
                        <li><a href=""><p>Favorite</p><p>the best moment of</p></a></li>
                        <li><a href=""><p>Feed</p><p>your life .</p></a></li>
                    </ul>
                </nav>
                <h1>Sharing photos and life style.</h1>
                <h2>Save your best moments of your life as often as you can,one day its gonna be your most precious things. <a href="">Log in</a> or <a href="">Join us now</a> to start sharing</h2>
            </header>

	</div>
	<div style="position: relative; top: 750px;">
	 <img src="./images/test.jpg" alt="HTML5 Icon">
	</div>
	<script src="./js/jquery.js"></script>
	<script type="text/javascript">

	$(window).scroll(function(){
	  if($(window).scrollTop() > 750){
	      $("#navbar-inverse").slideDown("fast");
	      document.getElementById('navbar-display').style.display = 'block';

	  }
	});
	$(window).scroll(function(){
	  if($(window).scrollTop() < 750){
	      $("#navbar-inverse").slideUp("fast");
	      document.getElementById('navbar-display').style.display = 'none';
	  }
	});
	</script>
@stop