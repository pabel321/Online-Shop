@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
			<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a>Customer Order Info</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span6">
		<div class="box-header" >
			<h2><i class="halflings-icon user"></i><span class="break"></span>Customer Information</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Customer Name</th>
						<th>Customer Phone</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach($order_by_id as $v_order)
						@endforeach 
						<td class="center">{{$v_order->customer_name}}</td>
						<td class="center">{{$v_order->mobile_number}}</td>
					</tr>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->	
	<div class="box span6">
		<div class="box-header" >
			<h2><i class="halflings-icon user"></i><span class="break"></span>Delivary Details</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Username</th>
						<th>Address</th>
						<th>Mobile Number</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach($order_by_id as $v_order)
						@endforeach
						<td class="center">{{$v_order->shipping_first_name}}</td>
						<td class="center">{{$v_order->shipping_address}}</td>
						<td class="center">{{$v_order->mobile_number}}</td>
					</tr>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->
</div><!--/row-->

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" >
			<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Sales Quantity</th>
						<th>Product Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach($order_by_id as $v_order)
					<tr>
						<td class="center">{{$v_order->order_id}}</td>
						<td class="center">{{$v_order->product_name}}</td>
						<td class="center">{{$price=$v_order->product_price}}</td>
						<td class="center">{{$v_order->product_sales_quantity}}</td>
						<td class="center">{{$v_order->product_sales_quantity*$price}}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="4">Total With Vat: </td>
						<td class="center">{{$v_order->order_total}}</td>
					</tr>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->
</div><!--/row-->






@endsection