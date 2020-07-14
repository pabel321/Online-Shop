@extends('manager_layout')
@section('manager_content')

<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{URL::to('/manager-page')}}">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{URL::to('/manager-page')}}">Manager</a></li>
	</ul>

	<div class="row-fluid">	
		<a class="quick-button metro pink span2"  href="{{URL::to('/all-review')}}">
			<i class="icon-comments-alt"></i>
			<p>Comments</p>
			<?php
                $all_comment_count=DB::table('tbl_review')
                            ->get();
            ?>
			<span class="notification red"><?php echo count($all_comment_count); ?></span>
		</a>
		<a class="quick-button metro green span2 " href="{{URL::to('/all-subscriber')}}" >
			<i class=" icon-heart"></i>
			<p>Subscriber</p>
			<?php
                $all_subscriber_count=DB::table('tbl_subscribe')
                            ->get();
            ?>
			<span class="notification red"><?php echo count($all_subscriber_count); ?></span>
		</a>
		<div class="clearfix"></div>
						
	</div><!--/row-->
</br>

	<div class="row-fluid">
		
	
		<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
			<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
			<?php
        		$all_visitor=DB::table('tbl_viewer')
        			->where('viewer_id',1)
                    ->get();
    		foreach($all_visitor as $v_visitor){?>
			<div class="number">{{$v_visitor->viewer_number}}<i class="icon-arrow-down"></i></div>
			<?php }?>
			<div class="title">visits</div>
			<div class="footer">
				<a> Total Visitors</a>
			</div>
		</div>	
		
	</div>

			
       


@endsection