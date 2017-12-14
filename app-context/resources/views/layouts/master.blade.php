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

			@if(Auth::check())
				<!-- Dropdown for Create -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarnew" data-toggle="dropdown">
						<i class="fa fa-plus" aria-hidden="true"></i>
						New
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/asset/create">Asset</a>
						<a class="dropdown-item" href="/computertype/create">Computer Type</a>
					</div>
				</li>
				<!-- Dropdown for View-->
				<li class="nav-item dropdown">

					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						<i class="fa fa-table" aria-hidden="true"></i>
						View
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/asset">Assets</a>
						<a class="dropdown-item" href="/assetrepairs">Asset Repairs</a>
						<a class="dropdown-item" href="/computer">Computers</a>
						<a class="dropdown-item" href="/computertype">Computer Types</a>
						<a class="dropdown-item" href="/group">Groups</a>
						<a class="dropdown-item" href="/location">Locations</a>
						<a class="dropdown-item" href="/outofservicecode">Out of Service Codes</a>
						<a class="dropdown-item" href="/vendor">Vendors</a>
						<a class="dropdown-item" href="/warranty">Warranties</a>
					</div>
				</li>
				<!-- Dropdown for Search-->
				<li class="nav-item dropdown">

					<a class="nav-link dropdown-toggle" href="#" id="navbarsearch" data-toggle="dropdown">
						<i class="fa fa-search" aria-hidden="true"></i>
						Search
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/asset/search">Asset</a>
					</div>
				</li>
				<!-- Link for Log out -->
				<li>
					<form method='POST' id='logout' action='/logout'>
						{{csrf_field()}}
						<a class="nav-link" href='#' onClick='document.getElementById("logout").submit();'>
							<i class="fa fa-sign-out" aria-hidden="true"></i>
							Logout {{ $user->name }}
						</a>
					</form>
				</li>
			@else
				<!-- Link for Registeration -->
				<li class="nav-item">
					<a class="nav-link" href="/register">
						<i class="fa fa-user-plus" aria-hidden="true"></i>
						Register
					</a>
				</li>
				<!-- Link for Log in -->
				<li class="nav-item">
					<a class="nav-link" href="/login">
						<i class="fa fa-sign-in" aria-hidden="true"></i>
						Login
					</a>
				</li>
			@endif
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
	</section>

	<footer class="text-center">
		<br />
		<p>
			<a href="http://validator.w3.org/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" /></a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
		</p>
	</footer>
</body>
@stack('scripts')
</html>
