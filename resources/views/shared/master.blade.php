<html>
<head>	
	<title>
		@yield('title')
	</title>

	<link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/bootstrap-theme.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/main.css') !!}" rel="stylesheet">
	<script src="{!! asset('js/jquery.js') !!}"></script>
	<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
	<script src="{!! asset('js/script.js') !!}"></script>
</head>
<body>
	<div class="container">
		@include('shared/header')
		
		@yield('content')
		
		@include('shared/footer')
	</div>
</body>
</html>