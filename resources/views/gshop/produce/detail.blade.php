@extends('templates.gshop.master')
@section('content')
	
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="entry-content">
							<div class="row">
								<div class="col-sm-6 col-md-4">
									<div class="product-images">
										<figure class="large-image">
											<a href="/storage/app/files/{{$item->picture}}"><img src="/storage/app/files/{{$item->picture}}" alt="{{$item->description}}"></a>
										</figure>
									</div>
								</div>
								<div class="col-sm-6 col-md-8">
									<h2 class="entry-title">{{$item->name}}</h2>
						@php
							$cost = $item->cost;
				            $disc = $item->recost;
				            $recost = $cost * (100 - $disc) / 100;
				            $dcost = number_format($cost,0,',','.');
				            $drecost = number_format($recost,0,',','.');
						@endphp
									<small style="display:inline;color:red;text-decoration: line-through" class="price">{{$drecost}}</small>
									<small style="display:inline;margin-left:40px " class="price">{{$dcost}}</small>
									{!!$item->detail!!}

									<div class="addtocart-bar">
										<form action="#">
											<label for="#">Quantity</label>
											<select name="soluong">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select>
											<input type="submit" value="Add to cart">
										</form>

										<div class="social-links square">
											<strong>Share</strong>
											<a href="https://www.facebook.com/CMYGaming/" class="facebook"><i class="fa fa-facebook"></i></a>
											<a href="https://youtube.com/c/CMYGaming" class="pinterest"><i class="fa fa-youtube"></i></a>
											<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<section>
							<header>
								<h2 class="section-title">Vật phẩm liên quan</h2>
							</header>
							<div class="product-list">
						@foreach($ritems as $ritem)
							@php
								$id = $ritem->pid;
								$name = $ritem->name;
								$pic = "/storage/app/files/" . $ritem->picture;
								$des = $ritem->description;
								$url = route('gshop.produce.detail', ['slug' => str_slug($name), 'id' => $id]);
								$cost = $ritem->cost;
								$disc = $ritem->recost;
								$recost = $cost * (100 - $disc) / 100;
								$dcost = number_format($cost,0,',','.');
								$drecost = number_format($recost,0,',','.');
							@endphp
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<img src="{{$pic}}" alt="{{$des}}">
										</div>
										<h3 class="product-title"><a href="{{$url}}">{{$name
										}}</a></h3>
										<small style="display:inline;color: red;text-decoration: line-through" class="price">{{$dcost}} VND</small>
										<small style="display:inline;margin-left:10px" class="price">{{$drecost}} VND</small>
										<p>{{$des}}</p>
										<a href="#" class="button">Add to cart</a>
										<a href="{{$url}}" class="button muted">Xem chi tiết</a>
									</div>
								</div> <!-- .product -->
							@endforeach
								
							</div> <!-- .product-list --></section>

						
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->

@stop