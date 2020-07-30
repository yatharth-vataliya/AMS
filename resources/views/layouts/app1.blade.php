<!DOCTYPE html>
<html lang="en">
<head>

	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('assests/css/bootstrap.min.css') }}" >

</head>
<body background="{{ asset('images/mainbg1.jpg') }}" >

		<main>
			@yield('content')
		</main>
	<script src="{{ asset('assests/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assests/js/bootstrap.min.js') }}" type="text/javascript"></script>

</body>
</html>