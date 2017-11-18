<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Alpine Inventory Tracking System')
    </title>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="generator" content="Mobirise v4.4.1, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/webassets/images/alpine-log-500x352.png" type="image/x-icon">

    <link rel="stylesheet" href="/webassets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="/webassets/tether/tether.min.css">
    <link rel="stylesheet" href="/webassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/webassets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/webassets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/webassets/dropdown/css/style.css">
    <link rel="stylesheet" href="/webassets/theme/css/style.css">
    <link rel="stylesheet" href="/webassets/mobirise/css/mbr-additional.css" type="text/css">

    @stack('head')

</head>
<body>

	<section class="menu cid-qAUBBCkSrN" once="menu" id="menu1-1" data-rv-view="33">

	    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
	        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	            <div class="hamburger">
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	            </div>
	        </button>
	        <div class="menu-logo">
	            <div class="navbar-brand">
	                <span class="navbar-logo">
	                    <a href="#top">
	                         <img src="/webassets/images/alpine-log-500x352.png" alt="Mobirise" title="" media-simple="true" style="height: 3.8rem;">
	                    </a>
	                </span>
	                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-5" href="/">Alpine Inventory Tracking System</a></span>
	            </div>
	        </div>
	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item dropdown">
	                    <a class="nav-link link text-white dropdown-toggle display-4" href="" data-toggle="dropdown-submenu" aria-expanded="false">
	                        <span class="mbri-plus mbr-iconfont mbr-iconfont-btn"></span>
	                        New</a><div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="/asset/create">Asset</a></div>
	                </li>
	                <li class="nav-item dropdown open">
	                    <a class="nav-link link text-white dropdown-toggle display-4" href="http://eweek.com" data-toggle="dropdown-submenu" aria-expanded="true">
	                        <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
	                        Search</a><div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="#top">Asset</a></div>
	                </li></ul>

	        </div>
	    </nav>
	</section>

	@if(session('message'))
	    <div class='alert'>{{ session('message') }}</div>
	@endif

	<section>
		@yield('content')
	</section>

	<footer>
		&copy; {{ date('Y') }}
	</footer>

    @stack('body')

	<script src="/webassets/web/assets/jquery/jquery.min.js"></script>
    <script src="/webassets/popper/popper.min.js"></script>
    <script src="/webassets/tether/tether.min.js"></script>
    <script src="/webassets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/webassets/smooth-scroll/smooth-scroll.js"></script>
    <script src="/webassets/dropdown/js/script.min.js"></script>
    <script src="/webassets/touch-swipe/jquery.touch-swipe.min.js"></script>
    <script src="/webassets/theme/js/script.js"></script>
    <script src="/webassets/formoid/formoid.min.js"></script>

</body>
</html>
