<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->

<head>
	<title> chefkhalil </title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/site/css/animations.css')}}">
	<link rel="stylesheet" href="{{asset('assets/site/css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{asset('assets/site/css/main.css')}}" class="color-switcher-link">
	<link rel="stylesheet" href="{{asset('assets/site/css/shop.css')}}" class="color-switcher-link">

	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6063a4476f7ab900129cec66&product=inline-share-buttons" async="async"></script>
	{{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}



</head>

<body>
	<div class="preloader">
		<h1> @yield('loading') </h1>
		<div id="cooking">
			<div class="bubble"></div>
			<div class="bubble"></div>
			<div class="bubble"></div>
			<div class="bubble"></div>
			<div class="bubble"></div>
			<div id="area">
				<div id="sides">
					<div id="pan"></div>
					<div id="handle"></div>
				</div>
				<div id="pancake">
					<div id="pastry"></div>
				</div>
			</div>
		</div>
	</div>

    <!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

            @yield('header')

            @yield('content')

            @yield('footer')

        </div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->


	<script src="{{asset('assets/site/js/compressed.js')}}"></script>
	<script src="{{asset('assets/site/js/main.js')}}"></script>

</body>

</html>
