 @extends('layout')
 @section('content')

 <h2 class="title text-center">Category Items</h2>
 <?php foreach($product_by_category as $v_category_by_product){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to($v_category_by_product->product_image)}}" style="height: 245px" alt="" />
                        <h2>TK {{$v_category_by_product->product_price}}</h2>
                        <p>{{$v_category_by_product->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>TK {{$v_category_by_product->product_price}}</h2>
                            <p><?php echo strip_tags($v_category_by_product->product_short_description);?></p>
                            <a href="{{URL::to('/view_product/'.$v_category_by_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
            </div>
             <div class="choose">
                <?php $customer_id=Session::get('customer_id'); ?>
                <ul class="nav nav-pills nav-justified">
                    <?php if($customer_id != NULL) {?>
                        <li><a href="{{URL::to('/add-wishlist/'.$v_category_by_product->product_id)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                     <?php } else {?>  
                        <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> Add to wishlist</a></li>
                    <?php } ?>
                    <li><a href="{{URL::to('/view_product/'.$v_category_by_product->product_id)}}"><i class="fa fa fa-eye"></i>View Product</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
</div><!--features_items-->

 @endsection