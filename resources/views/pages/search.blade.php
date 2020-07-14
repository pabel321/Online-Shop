 @extends('layout')
 @section('content')
 <section>
<div class="container col-sm-12 padding-right">
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Searching Result</h2>
	<p>The Searching result for your query<b></b>:</p>
	<?php foreach($search_result as $v_searching_product){?>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="{{URL::to($v_searching_product->product_image)}}" alt="" />
					<h2>TK {{$v_searching_product->product_price}}</h2>
					<p>{{$v_searching_product->product_name}}</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>TK {{$v_searching_product->product_price}}</h2>
						<p><?php echo strip_tags($v_searching_product->product_short_description); ?></p>
						<a href="{{URL::to('/view_product/'.$v_searching_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="{{URL::to('/view_product/'.$v_searching_product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
</div><!--features_items-->
</div>
</section>

@endsection