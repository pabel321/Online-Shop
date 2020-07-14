 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NIBIZ-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('frontend/images/favicon.png')}}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="tel:+8801712643138"><i class="fa fa-phone"></i> +8801712643138</a></li>
                                <li><a href="mailto:info@nibizsoft.com"><i class="fa fa-envelope"></i> info@nibizsoft.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="https://nav navbar-nav">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle nydn"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{url('/')}}"><img src="{{URL::to('frontend/images/home/logo.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    BD
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Dhaka</a></li>
                                    <li><a href="#">Chottagong</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                 <?php $customer_id=Session::get('customer_id');
                                    $shipping_id=Session::get('shipping_id');
                             ?>
                            <?php if($customer_id != NULL) {?>
                                <li><a href="{{URL::to('/user-account')}}"><i class="fa fa-user"></i> Account</a></li>
                            <?php } else {?>  
                            <?php } ?>

                            <?php if($customer_id != NULL) {?>
                                <li><a href="{{URL::to('/user-order')}}"><i class="fa fa-credit-card"></i> Order</a></li>
                            <?php } else {?>  
                            <?php } ?>

                            <?php if($customer_id != NULL) {?>
                                <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            <?php } else {?>  
                            <?php } ?>
                             
                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php $customer_id=Session::get('customer_id'); ?>

                            <?php if($customer_id != NULL) {?>
                                <li><a href="{{URL::to('/customer-logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                             <?php } else {?>
                                <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{url('/')}}" class="active">Home</a></li>
                                <li><a href="{{URL::to('/shopping')}}" >Shop</a></li>
                                <li><a href="{{URL::to('/contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{URL::to('/search')}}" method="post" role="search">
                            {{ csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text"  name="search" placeholder="Search"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
   <?php 
    $all_published_slider=DB::table('tbl_slider')
    ->where('publication_status',1)
    ->get(); 

?>  

 <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <?php 
                                $all_published_slider=DB::table('tbl_slider')
                                                        ->where('publication_status',1)
                                                        ->get();
                                $i=1;
                                foreach($all_published_slider as $v_slider){
                                        if($i==1){
                             ?>
                                        <div class="item active">
                            <?php } else { ?>
                                <div class="item">
                            <?php } ?>
                            
                                <div class="col-sm-5">
                                    <h1><span>NIBIZ</span>-SHOPPER</h1>
                                    <h2>Shopping the way you like it!</h2>
                                    <p>Transforming shopping into an experience. Treasure every day. Whatever you’ve got in mind, we’ve got inside. Where fashion comes to life.</p>
                                </div>
                                <div class="col-sm-7">
                                    <img src="{{URL::to($v_slider->slider_image)}}" class="girl img-responsive" alt="" />
                                    <img src="{{URL::to('images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                        <?php $i++; } ?>
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
</section><!--/slider-->

    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <?php
                                    $all_published_category=DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->get();
                                    foreach($all_published_category as $v_category){?>
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></h4>
                                </div>
                                <?php } ?>
                            </div>
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                <?php
                                    $all_published_manufacture=DB::table('tbl_manufacture')
                                                        ->where('publication_status',1)
                                                        ->get();
                                    foreach($all_published_manufacture as $v_manufacture){?>

                                    <li><a href="{{URL::to('/product_by_manufacture/'.$v_manufacture->manufacture_id)}}"> 
                                        <?php
                                             $all_product_count=DB::table('tbl_products')
                                             ->where('manufacture_id',$v_manufacture->manufacture_id)
                                            ->get();
                                        ?>
                                    <span class="pull-right"><?php echo count($all_product_count);?></span>{{$v_manufacture->manufacture_name}}</a></li>

                                <?php } ?>
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{URL::to('frontend/images/home/shipping2.jpg')}}" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->

                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>NIBIZ</span>-Shopper</h2>
                            <p>A fresh approach to shopping.</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a >
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/shop/Meharub.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Meharub Khan</p>
                                <h2>Managing Director</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a >
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/shop/raafiq.jpg')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Rafiqul Islam</p>
                                <h2>Development Officer</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a >
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/shop/sabbir.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Sabbir Ahmed</p>
                                <h2>Strategy & Planning</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a >
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/shop/mine.PNG')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Fakhrul Islam</p>
                                <h2>Web Developer</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{URL::to('frontend/images/home/map.png')}}" alt="" />
                            <p>House 38, Garib e-Newaj Avenue Sector 11, Uttara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                              
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quick Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About NI-BIZ Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Subscribe</h2>
                            <p class="alert-success">
                                <?php
                                $message=Session::get('message');
                                
                                if($message)
                                {
                                    echo $message;
                                    Session::put('message',NULL);
                                }
                                ?>
                            </p>
                            <form action="{{url('/save-subscriber')}}" method="post"class="searchform">
                                {{csrf_field()}}
                                <input type="email" name="subscriber_email" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2018 NIBIZ-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="#">Fakhrul</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>