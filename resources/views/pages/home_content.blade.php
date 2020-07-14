@extends('slider')
@section('content')

 <h2 class="title text-center">Features Items</h2>
 <?php foreach($all_published_product as $v_published_product){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to($v_published_product->product_image)}}" style="height: 245px" alt="" />
                        <h2>TK {{$v_published_product->product_price}}</h2>
                        <p>{{$v_published_product->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>TK {{$v_published_product->product_price}}</h2>
                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}"><p><?php echo strip_tags($v_published_product->product_short_description); ?></p></a>
                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
            </div>
            <div class="choose">
                <?php $customer_id=Session::get('customer_id'); ?>
                <ul class="nav nav-pills nav-justified">
                    <?php if($customer_id != NULL) {?>
                        <li><a href="{{URL::to('/add-wishlist/'.$v_published_product->product_id)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                     <?php } else {?>  
                        <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> Add to wishlist</a></li>
                    <?php } ?>
                    <li><a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}"><i class="fa fa fa-eye"></i>View Product</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
</div><!--features_items-->

<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#womens" data-toggle="tab">Womens</a></li>
            <li><a href="#mens" data-toggle="tab">Mens</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#electronic" data-toggle="tab">Electronics</a></li>
        </ul>
        
    </div>
    <div class="tab-content">
       
        <div class="tab-pane fade active in" id="womens" >
             <?php
            $single_view_products=DB::table('tbl_products')
            ->where('category_id',7)
            ->limit(4)
            ->get();
         foreach($single_view_products as $v_products_single){?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to($v_products_single->product_image)}}" alt="" />
                            <h2>TK {{$v_products_single->product_price}}</h2>
                            <p>{{$v_products_single->product_name}}</p>
                            <a href="{{URL::to('/view_product/'.$v_products_single->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
             <?php } ?>
        </div>
    <div class="tab-pane fade" id="mens" >
          <?php
            $all_view_products=DB::table('tbl_products')
            ->where('category_id',6)
            ->limit(4)
            ->get();
         foreach($all_view_products as $v_products_category){?>
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to($v_products_category->product_image)}}" alt="" />
                        <h2>TK {{$v_products_category->product_price}}</h2>
                        <p>{{$v_products_category->product_name}}</p>
                        <a href="{{URL::to('/view_product/'.$v_products_category->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
         <?php } ?>
    </div>
    <div class="tab-pane fade" id="kids" >
         <?php
            $all_view_productss=DB::table('tbl_products')
            ->where('category_id',9)
            ->limit(4)
            ->get();
         foreach($all_view_productss as $v_products_categorys){?>
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to($v_products_categorys->product_image)}}" alt="" />
                        <h2>TK {{$v_products_categorys->product_price}}</h2>
                        <p>{{$v_products_categorys->product_name}}</p>
                        <a href="{{URL::to('/view_product/'.$v_products_categorys->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="tab-pane fade" id="electronic" >
          <?php
            $all_view_productsss=DB::table('tbl_products')
            ->where('category_id',14)
            ->limit(4)
            ->get();
         foreach($all_view_productsss as $v_products_categoryss){?>
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to($v_products_categoryss->product_image)}}" alt="" />
                        <h2>TK {{$v_products_categoryss->product_price}}</h2>
                        <p>{{$v_products_categoryss->product_name}}</p>
                        <a href="{{URL::to('/view_product/'.$v_products_categoryss->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
         <?php } ?>
    </div>
</div>
</div><!--/category-tab-->



 @endsection