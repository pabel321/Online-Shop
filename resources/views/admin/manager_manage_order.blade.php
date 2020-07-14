@extends('manager_layout')
@section('manager_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/manager-page')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a>All Order List</a></li>
			</ul>
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
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Total Price</th>
								  <th>Status</th>
								  <th>Actions</th>
								  <th>View</th>
							  </tr>
						  </thead> 
						  @foreach($all_order_info as $v_order)
						  <tbody>
							<tr>
								<td>{{$v_order->order_id}}</td>
								<td class="center">{{$v_order->customer_name}}</td>
								<td>{{$v_order->order_total}}</td>
								@if($v_order->order_status==1)
								<td class="center">Pending</td>
								@elseif($v_order->order_status==2)
								<td class="center">Delivered</td>
								@elseif($v_order->order_status==3)
								<td class="center">No Payment</td>
								@elseif($v_order->order_status==4)
								<td class="center">Received</td>
								@endif
								<td class="center">
									@if($v_order->order_status==1)
									<a class="btn btn-success" href="{{URL::to('/confirm-payment/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/reject-payment/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@elseif($v_order->order_status==2)
									<span class="label label-success">Delivered</span>
									@elseif($v_order->order_status==3)
									<span class="label label-danger">No Payment</span>
									@else($v_order->order_status==4)
									<span class="label label-success">Received</span>
									@endif
								</td>
								<td>
									<a class="btn btn-info" href="{{URL::to('/m_view-order/'.$v_order->order_id)}}">
										<i class="halflings-icon white view"></i>  
									</a>
								</td>
							</tr>

						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection