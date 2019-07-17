<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<!-- jQuery library -->


<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
	.error{
		color:red;
	}
</style>
<body>
    <div class="alert alert-success" role="alert">
      @yield('title')
    </div>
    <div class="container"> 
    	@yield('content')
    </div>
</body>
</html>