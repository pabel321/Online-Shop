@extends('layout')
@section('content')

<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Pay <strong>Bkash</strong></h2>
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
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Our Payment Number: 01814766106</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" action="{{url('/give-payment')}}" class="contact-form row" name="contact-form" method="post">
				    		{{csrf_field()}}
				    		<div class="form-group col-md-6">
				                <input type="number" name="order_id" class="form-control" required="required" placeholder="Enter Order Number">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="number" name="transaction" class="form-control" required="required" placeholder="Enter Transaction Number">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="number" name="amount" class="form-control" required="required" placeholder="Enter Amount">
				            </div>               
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	</div> 
	    	<div class="row">
	    			    		<div class="col-sm-9">
	    		<div class="table-responsive cart_info ">
				<h4>Remember Your Order Number Which is Pending</h4>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Order ID</td>
							<td class="price">Price</td>
							<td class="quantity">Status</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$customer_order_info= DB::table('tbl_order')
                            
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                            ->join('tbl_shipping','tbl_order.customer_id','=','tbl_shipping.customer_id')
                            ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','tbl_customer.*')
                            ->get();

						foreach ($customer_order_info as $v_showorder) {?>

						<tr>
							
							<td class="cart_description">
								<h4>{{$v_showorder->order_id}}</h4>
							</td>
							<td class="cart_price">
								<p>TK {{$v_showorder->order_total}}</p>
							</td>
							<td class="cart_total">
								@if($v_showorder->order_status==1)
								<p class="cart_total_price">Pending</p>
								@elseif($v_showorder->order_status==2)
								<p class="cart_total_price">Delivered</p>
								@elseif($v_showorder->order_status==3)
								<p class="cart_total_price">No Payment</p>
								@elseif($v_showorder->order_status==4)
								<p class="cart_total_price">Confirmed</p>
								@endif
							</td>
							
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
			</div>
			</div>
	    		<div class="col-sm-3">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>NIBIZ-Shopper Inc.</p>
							<p>House 38, Garib e-Newaj Avenue</p>
							<p>Sector 11, Uttara</p>
							<p>Dhaka 1230, Bangladesh</p>
							<p>Mobile: +8801712643138</p>
							<p>Email: info@nibizsoft.com</p>
	    				</address>
	    			</div>
	    		</div>

    			</div>  
    	</div>	
    </div><!--/#contact-page-->


@endsection