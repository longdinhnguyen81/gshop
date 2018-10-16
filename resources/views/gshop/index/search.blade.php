@extends('templates.gshop.master')
@section('content')
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="filter-bar">
							<div class="filter">
								<span>
									<label>Sắp xếp theo:</label>
									<select name="show" id="soft" onchange="getValue({{$cid}})">
										<option value="1">A-Z</option>
										<option value="2">Z-A</option>
										<option value="3">Giá giảm dần</option>
										<option value="4">Giá tăng dần</option>
									</select>
								</span>
								<span>
									<label>Hiển thị:</label>
									<select id="show" name="show" onchange="getValue({{$cid}})">
										<option value="8">8 vật phẩm</option>
										<option value="16">16 vật phẩm</option>
										<option value="24">24 vật phẩm</option>
									</select>
								</span>
							</div> <!-- .filter -->

						</div> <!-- .filter-bar -->
						
						<div class="product-list" id="result">
						@foreach($items as $item)
							@php
								$id = $item->pid;
								$name = $item->name;
								$pic = "/storage/app/files/" . $item->picture;
								$des = $item->description;
								$url = route('gshop.produce.detail', ['slug' => str_slug($name), 'id' => $id]);
								$cost = $item->cost;
								$disc = $item->recost;
								$recost = $cost * (100 - $disc) / 100;
								$dcost = number_format($cost,0,',','.');
								$drecost = number_format($recost,0,',','.');
							@endphp
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="{{$url}}"><img src="{{$pic}}" alt="{{$des}}"></a>
										</div>
										<h3 class="product-title"><a href="{{$url}}">{{$name}}</a></h3>
										<span style="color:red;text-decoration: line-through">{{$dcost}} VND</span>
										<span style="color:#45b77d;margin-left:10px">{{$drecost}} VND</span>
										<p>{{$des}}</p>
										<a href="" class="button">Add to cart</a>
										<a href="{{$url}}" class="button muted">Xem chi tiết</a>
									</div>
								</div> <!-- .product -->
						@endforeach
						</div> <!-- .product-list -->

						<div class="pagination-bar">
							<div class="pagination">
								{{$items->links()}}
							</div> <!-- .pagination -->
						</div>
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->
<script type="text/javascript">
    function getValue(cid){
        $.ajax({
          url: "{{route('ajax.produce.getvalue')}}",
          type: 'GET',
          cache: false,
          data: {value : $("#show").val(), so : $("#soft").val(), id : cid},
          success: function(data){
            $('#result').html(data);
          }, 
          error: function() {
           alert("Có lỗi");
         }
       }); 
        return false;
      }
</script>
@stop