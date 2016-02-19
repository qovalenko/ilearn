<!DOCTYPE html>
<!--                                     ____
                                         |  |
       _____  _  ___  ________  ______   |  |__     __   __
     / 	___/ | ' __/ |  ___  | /  _____\ |   _  \  |  | |  |
    |  |__   |  |    | |___| | \_____  \ |  |_)  | |  |_|  |
     \_____\ |__|    |_______| /_______/ |_'____/  _\___,  |
                 http://alfredcrosby.com          |_______/
 -->
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('page_title')</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
	@yield('header_scripts')

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  	<div class="wrapper">
		@include('header')

		@if(Auth::user()->hasRole('staff'))
	  		@include('sidebars.staff')
	  	@elseif(Auth::user()->hasRole('teacher'))
	  		@include('sidebars.teacher')
	  	@elseif(Auth::user()->hasRole('student'))
	  		@include('sidebars.student')
  		@endif

		<div class="content-wrapper">
			<section class="content-header">
				<h1> @yield('page_title') <small> @yield('page_description') </small></h1>

				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
					<li class="active">Here</li>
				</ol>
			</section>

			<section class="content">
				@yield('content')
			</section>
		</div>

		@include('footer')

		@include('sidebars.controls.staff')
	</div><!-- ./wrapper -->

	<script src="{{ asset ('/js/libs/jquery.min.js') }}"></script>
	<script src="{{ asset ('/js/libs/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset ('/js/libs/adminlte.app.min.js') }}" type="text/javascript"></script>
	@yield('footer_scripts')
</body>
</html>