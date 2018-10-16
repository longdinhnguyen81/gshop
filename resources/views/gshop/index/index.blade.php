@extends('templates.gshop.master')
@section('content')
			<div class="home-slider">
				<ul class="slides">
					@foreach($slideItems as $slide)
					@php
						$id = $slide->pid;
						$name = $slide->name;
						$cname = $slide->cname;
						$des = $slide->description;
						$cost = $slide->cost;
						$ecost = number_format($slide->cost,0,',','.'). ' VND';
						$disc = $slide->recost;
						$rcost = $cost*(100-$disc)/100;
						$recost = number_format($rcost,0,',','.'). ' VND';
						$pic = '/storage/app/files/'.$slide->picture;
					@endphp
					<li data-bg-image="/templates/gshop/images/pub.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">{{$name}}</h2>
								<small style="display: inline;background-color:black;padding: 5px;margin: 10px" class="slide-subtitle">{{$cname}}</small><br>
								<small style="text-decoration: line-through;color: red; display: inline;" class="slide-subtitle">{{$ecost}}</small><br>
								<small style="display: inline;" class="slide-subtitle">{{$recost}}</small><br><br>
								
								<p style="color:white;font-size:16px">{{$des}}</p>
								
								<a href="cart.html" class="button">Thêm vào giỏ hàng</a>
							</div>

							<img src="{{$pic}}" style="width:350px;height:400px" class="slide-image">
						</div>
					</li>
					@endforeach
				</ul> <!-- .slides -->
			</div> <!-- .home-slider -->

			<main class="main-content">
				<div class="container">
					<div class="page">
						<section>
							<header>
								<h2 class="section-title">CS:GO</h2>
								<a href="/produce/csgo-1" class="all">Xem tất cả</a>
							</header>

							<div class="product-list">
							@foreach($CSItems as $CSItem)
							@php
								$id = $CSItem->pid;
								$name = $CSItem->name;
								$des = $CSItem->description;
								$cost = $CSItem->cost;
								$ecost = number_format($CSItem->cost,0,',','.'). ' VND';
								$disc = $CSItem->recost;
								$rcost = $cost*(100-$disc)/100;
								$recost = number_format($rcost,0,',','.'). ' VND';
								$pic = '/storage/app/files/'.$CSItem->picture;
								$url = route('gshop.produce.detail', ['slug' => str_slug($name), 'id' => $id]);
							@endphp
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="{{$url}}"><img src="{{$pic}}" alt="{{$des}}"></a>
										</div>
										<h3 class="product-title"><a href="{{$url}}">{{$name}}</a></h3>
										<small style="text-decoration: line-through;color: red;display:inline" class="price">{{$ecost}}</small>
										<small class="price">{{$recost}}</small>
										<p>{{$des}}</p>
										<a href="cart" class="button">Add to cart</a>
										<a href="{{$url}}" class="button muted">Chi tiết</a>
									</div>
								</div> <!-- .product -->
							@endforeach
							</div> <!-- .product-list -->

						</section>

						<section>
							<header>
								<h2 class="section-title">DOTA 2</h2>
								<a href="/produce/dota-2-3" class="all">Xem tất cả</a>
							</header>

							<div class="product-list">
							@foreach($DOItems as $DOItem)
							@php
								$id = $DOItem->pid;
								$name = $DOItem->name;
								$des = $DOItem->description;
								$cost = $DOItem->cost;
								$ecost = number_format($DOItem->cost,0,',','.'). ' VND';
								$disc = $DOItem->recost;
								$rcost = $cost*(100-$disc)/100;
								$recost = number_format($rcost,0,',','.'). ' VND';
								$pic = '/storage/app/files/'.$DOItem->picture;
								$url = route('gshop.produce.detail', ['slug' => str_slug($name), 'id' => $id]);
							@endphp
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="{{$url}}"><img src="{{$pic}}" alt="{{$des}}"></a>
										</div>
										<h3 class="product-title"><a href="{{$url}}">{{$name}}</a></h3>
										<small style="text-decoration: line-through;color: red;display:inline" class="price">{{$ecost}}</small>
										<small class="price">{{$recost}}</small>
										<p>{{$des}}</p>
										<a href="cart" class="button">Add to cart</a>
										<a href="{{$url}}" class="button muted">Chi tiết</a>
									</div>
								</div> <!-- .product -->
							@endforeach
							</div> <!-- .product-list -->

						</section>
						<section>
							<header>
								<h2 class="section-title">PUBG</h2>
								<a href="/produce/pubg-4" class="all">Xem tất cả</a>
							</header>

							<div class="product-list">
							@foreach($PUItems as $PUItem)
							@php
								$id = $PUItem->pid;
								$name = $PUItem->name;
								$des = $PUItem->description;
								$cost = $PUItem->cost;
								$ecost = number_format($PUItem->cost,0,',','.'). ' VND';
								$disc = $PUItem->recost;
								$rcost = $cost*(100-$disc)/100;
								$recost = number_format($rcost,0,',','.'). ' VND';
								$pic = '/storage/app/files/'.$PUItem->picture;
								$url = route('gshop.produce.detail', ['slug' => str_slug($name), 'id' => $id]);
							@endphp
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="{{$url}}"><img src="{{$pic}}" alt="{{$des}}"></a>
										</div>
										<h3 class="product-title"><a href="{{$url}}">{{$name}}</a></h3>
										<small style="text-decoration: line-through;color: red;display:inline" class="price">{{$ecost}}</small>
										<small class="price">{{$recost}}</small>
										<p>{{$des}}</p>
										<a href="cart" class="button">Add to cart</a>
										<a href="{{$url}}" class="button muted">Chi tiết</a>
									</div>
								</div> <!-- .product -->
							@endforeach
							</div> <!-- .product-list -->

						</section>
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->
@stop