<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Ecommerce Video Game | Cart</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="/templates/gshop/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="/templates/gshop/fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="/templates/gshop/style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
		<style>
			.dropdown {
			    position: relative;
			    display: inline-block;
			}

			.dropdown-content {
			    display: none;
			    position: absolute;
			    background-color: #f1f1f1;
			    min-width: 200px;
			    box-shadow: 0px 8px 10px 0px rgba(0,0,0,0.2);
			    z-index: 1;
			}

			.dropdown-content a {
			    text-decoration: none;
			    display: block;
			}

			.dropdown-content a:hover {background-color: #ddd;}

			.dropdown:hover .dropdown-content {display: block;}

			.dropdown:hover .dropbtn {background-color: #3e8e41;}
			</style>
	</head>


	<body class="slider-collapse">
		
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="{{route('gshop.index.index')}}" id="branding">
						<img src="/templates/gshop/images/logo1.png" style="width: 60px; height: 60px" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">CMY Gaming</h1>
							<small class="site-description">Gaming store</small>
						</div>
					</a> <!-- #branding -->

					<div class="right-section pull-right">
						<a href="cart.html" class="cart"><i class="icon-cart"></i> 0 items in cart</a>
						<a href="#" class="login-button">Login/Register</a>
					</div> <!-- .right-section -->

					<div class="main-navigation">
						<button class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item home current-menu-item"><a href="{{route('gshop.index.index')}}"><i class="icon-home"></i></a></li>
					@foreach($dcats as $dcat)
							<li class="menu-item dropdown">
								<a href="{{route('gshop.produce.index',['slug' => str_slug($dcat->cname), 'cid' => $dcat->cid])}}">{{$dcat->cname}}						
						
							@if($dcat->cid == 8)
								</a>
								  <div class="dropdown-content">
								@foreach($pcats as $pcat)
								    <a style="" href="{{route('gshop.produce.index',['slug' => str_slug($pcat->cname), 'cid' => $pcat->cid])}}">{{$pcat->cname}}</a>
								@endforeach
								  </div>
							</li>
							@endif
								</a>

							
							</li>

					@endforeach
						</ul> <!-- .menu -->
						<div class="search-form">
							<label><img src="/templates/gshop/images/icon-search.png"></label>
							<input type="text" placeholder="Search...">
						</div> <!-- .search-form -->

						<div class="mobile-navigation"></div> <!-- .mobile-navigation -->
					</div> <!-- .main-navigation -->
				</div> <!-- .container -->
			</div> <!-- .site-header -->
