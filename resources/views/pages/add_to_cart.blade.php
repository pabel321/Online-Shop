@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
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
							<td>Delete</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contents as $v_contents) {?>

						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contents->attributes->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4>{{$v_contents->name}}</h4>
							</td>
							<td class="cart_price">
								<p>TK {{$v_contents->price}}</p>
							</td>
							<td class="">
								<div class="cart_quantity_button">
									<form action="{{url('/update-cart')}}" method="post" >
										{{csrf_field()}}
									<input value="{{$v_contents->quantity}}" disabled="">
									<input type="number" name="quantity" value="0" min="-{{($v_contents->quantity)-1}}">
									<input type="hidden" name="id" value="{{$v_contents->id}}">
									<input type="submit" class="hov" name="submit" value="Update">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->getPriceSum()}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->id)}}"><i class="fa fa-times"></i></a>
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
			<div class="row">
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>TK {{ $aa=Cart::getSubTotal()}}</span></li>

							<?php 

								 $extra=(($aa*5)/100);

							?>

							<li>Tax <span>5%</span></li>
							<li>Delivary Cost <span>Free</span></li>
							<li>Total <span>TK {{Cart::getTotal() + $extra }}</span></li>
						</ul>
						<?php $customer_id=Session::get('customer_id'); ?>
						<?php if($customer_id != NULL) {?>
							<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Check Out</a>
						 <?php } else {?>
						 	<a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
						 <?php } ?>
						 <a class="btn btn-default check_out" href="{{url('/shopping')}}">Continue Shopping</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->





@endsection