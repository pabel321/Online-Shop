@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Order</li>
				</ol>
			</div>
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
			<div class="table-responsive cart_info">
				<h4>When you received product that time confirm Received for make our relation better</h4>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Status</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($customer_order_info as $v_showorder) {?>

						<tr>
							
							<td class="cart_description">
								<h4>{{$v_showorder->customer_name}}</h4>
							</td>
							<td class="cart_price">
								<p>TK {{$v_showorder->order_total}}</p>
							</td>
							<td class="cart_total">
								@if($v_showorder->order_status==1)
								<p class="cart_total_price">Pending</p>
								@elseif($v_showorder->order_status==2)
								<p class="cart_total_price">Delivired</p>
								@elseif($v_showorder->order_status==3)
								<p class="cart_total_price">No Payment</p>
								@elseif($v_showorder->order_status==4)
								<p class="cart_total_price">Confirmed</p>
								@endif
							</td>
							
							<td class="cart_delete">
								@if($v_showorder->order_status==2)
								<a  href="{{URL::to('/received-order/'.$v_showorder->order_id)}}"><i class="fa fa-check-square-o"> Received</i></a>
							@elseif($v_showorder->order_status==1)
								<i class="fa fa-refresh"></i>
							@elseif($v_showorder->order_status==3)
								<i class="fa fa-times"></i>
							@else($v_showorder->order_status==4)
							<i class="fa fa-suitcase"></i>
							@endif
							</td>
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection