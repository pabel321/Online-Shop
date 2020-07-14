 @extends('layout')
 @section('content')
 <section>
<div class="container col-sm-12 padding-right">
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Features Items</h2>
	<?php foreach($all_shopping_product as $v_shopping_product){?>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="{{URL::to($v_shopping_product->product_image)}}" alt="" />
					<h2>TK {{$v_shopping_product->product_price}}</h2>
					<p>{{$v_shopping_product->product_name}}</p>
					<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>TK {{$v_shopping_product->product_price}}</h2>
						<p><?php echo strip_tags($v_shopping_product->product_short_description); ?></p>
						<a href="{{URL::to('/view_product/'.$v_shopping_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>
			</div>
			 <div class="choose">
                <?php $customer_id=Session::get('customer_id'); ?>
                <ul class="nav nav-pills nav-justified">
                    <?php if($customer_id != NULL) {?>
                        <li><a href="{{URL::to('/add-wishlist/'.$v_shopping_product->product_id)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                     <?php } else {?>  
                        <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> Add to wishlist</a></li>
                    <?php } ?>
                    <li><a href="{{URL::to('/view_product/'.$v_shopping_product->product_id)}}"><i class="fa fa fa-eye"></i>View Product</a></li>
                </ul>
            </div>
		</div>
	</div>
	<?php } ?>
</div><!--features_items-->
	<ul class="pagination">
		{!! $all_shopping_product->links(); !!}
	</ul>
</div>
</section>

 @endsection