<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title', 'Alpine Inventory Tracking System')
	</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/4da62dae18.js"></script>

	@stack('head')

</head>
<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand" href="/">
			<img src="/images/alpine-log-500x352.png" alt="Inventory Logo" title="Alpine Inventory Tracking System" style="height: 3.8rem;">
		</a>
		<a class="navbar-brand" href="/">Alpine Inventory Tracking System
		</a>

		<!-- Links -->
		<ul class="navbar-nav">

			<!-- Dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					<i class="fa fa-plus" aria-hidden="true"></i>
					New
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="/asset/create">Asset</a>
				</div>
			</li>
			<!-- Dropdown -->
			<li class="nav-item dropdown">

				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					<i class="fa fa-search" aria-hidden="true"></i>
					View
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="/asset">Asset</a>
				</div>
			</li>
		</ul>
	</nav>
	<br>

	<div class="container">
		<div class="row justify-content-center">
			@if(session('alert'))
			<div class='alert alert-success' role="alert">{{ session('alert') }}</div>
			@endif
		</div>
	</div>

	<section>
		@yield('content')
	</section>

	<section>


		@stack('body')

		<footer>
			&copy; {{ date('Y') }}
		</footer>

		<script>
		showComputerForm();
		function showComputerForm() {
			if (document.getElementById("is_computer").checked == true) {
				document.getElementById("computer_form").style.display = "block";
			} else {
				document.getElementById("computer_form").style.display = "none";
			}
		}

		showOutofserviceForm();
		function showOutofserviceForm() {
			if (document.getElementById("is_out_of_service").checked == true) {
				document.getElementById("outofservice_form").style.display = "block";
			} else {
				document.getElementById("outofservice_form").style.display = "none";
			}
		}
		</script>
	</body>
	</html>
