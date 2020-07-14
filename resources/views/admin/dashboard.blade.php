@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{URL::to('/dashboard')}}">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
	</ul>

	<div class="row-fluid">	

		<a class="quick-button metro yellow span3" href="{{URL::to('/view-user')}}">
			<i class="icon-group"></i>
			<p>Users</p>
			<?php
                $all_customer_count=DB::table('tbl_customer')
                            ->get();
            ?>
			<span class="notification red"><?php echo count($today_news); ?></span>
		</a>
		
		<a class="quick-button metro blue span3" href="{{URL::to('/manage-order')}}">
			<i class="icon-shopping-cart"></i>
			<p>Orders</p>
			<?php
                $all_order_count=DB::table('tbl_order')
                            ->get();
            ?>
		<span class="notification pink"><?php echo count($all_order_count); ?></span>
		</a>
		<a class="quick-button metro orangeDark span3" >
			<i class="icon-barcode"></i>
			<p>Products</p>
			<?php
                $all_product_count=DB::table('tbl_products')
                            ->get();
            ?>
			<span class="notification red"><?php echo count($all_product_count);?></span>
		</a>
		<a class="quick-button metro pink span3" href="{{URL::to('/view-message')}}" >
			<i class="icon-envelope"></i>
			<p>Messages</p>
			<?php
                $all_comment_count=DB::table('tbl_contact')
                            ->get();
            ?>
			<span class="notification red"><?php echo count($all_comment_count);?></span>
		</a>
		<div class="clearfix"></div>
						
	</div><!--/row-->
</br>

	<div class="row-fluid">
			<div class="span3 statbox greenLight" onTablet="span6" onDesktop="span3">
			<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
			<?php
                		$all_visitor=DB::table('tbl_viewer')
                			->where('viewer_id',1)
                            ->get();
            		foreach($all_visitor as $v_visitor){?>
			<div class="number">{{$v_visitor->viewer_number}}<i class="icon-arrow-down"></i></div>
			 <?php }?>
			<div class="title">visits</div>
			
		</div>	
		
	</div>		

	<div class="row-fluid">
		
		
		<div class="sparkLineStats span4 widget green" onTablet="span12" onDesktop="span12">
					<?php
                		$all_visitor=DB::table('tbl_viewer')
                			->where('viewer_id',1)
                            ->get();
            		foreach($all_visitor as $v_visitor){?>
            <ul class="unstyled">
                
                <li><span class="sparkLineStats3"></span> 
                    Pageviews: 
                    
                    <span class="number">{{$v_visitor->viewer_number}}</span>
                </li>
            </ul>
        <?php }?>
			
			<div class="clearfix"></div>

        </div><!-- End .sparkStats -->

	</div>
	<!-- End user Count -->			

			
       


@endsection