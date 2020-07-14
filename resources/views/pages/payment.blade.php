@extends('layout')
@section('content')


<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Payment</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
					 $contents=Cart::getContent();
/*
					 echo "<pre>";
					 print_r($contents);
					 echo "</pre>";
					 exit();*/
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contents as $v_contents) {?>

						<tr>
							<td class="cart_product">
								<a><img src="{{URL::to($v_contents->attributes->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4>{{$v_contents->name}}</h4>
							</td>
							<td class="cart_price">
								<p>TK {{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input value="{{$v_contents->quantity}}" disabled="">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->getPriceSum()}}</p>
							</td>
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		
		<div class="paymentCont col-sm-8">
			<div class="headingWrap">
				<h3 class="headingTop text-center">Select Your Payment Method</h3>	
				<p class="text-center">Without payment Product will not Delivar</p>
			</div>
			<form action="{{url('/order-place')}}" method="post">
				{{csrf_field()}}
				<div class="paymentWrap" style="width:400px; margin:0 auto;">
					<label class="btn">
						<img src="{{URL::to('frontend/images/payment/hand-cash.jpg')}}">
						<input type="radio" name="payment_gateway" value="handcash" required="">
					</label>
					<label class="btn">
						<img src="{{URL::to('frontend/images/payment/bkash.jpg')}}">
						<input type="radio" name="payment_gateway" value="bkash" required="">
					</label>
					<label class="btn">
						<a href="{{url('/payment-create-order')}}">Create Order</a>
					</label>
				</div>
				<input type="submit" value="Done" class="btn btn-success">
			</form>
		</div>
	</div>
</section><!--/#do_action-->

@endsection