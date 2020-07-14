@extends('layout')
@section('content')
<div class="breadcrumbs">
	<ol class="breadcrumb">
	  <li><a href="{{url('/')}}">Home</a></li>
	  <li class="active">User Account</li>
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
<div class="container" >
	<div class="row">
		<div class="col-sm-4">
			<h2>Your Current Information</h2>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td ><b>Name</b></td>
							<td ><b>Email</b></td>
							<td ><b>Phone</b></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td >
								<p><b><?php echo($user_accountt->customer_name);?></b></p>
							</td>
							<td >
								<p> <?php echo($user_accountt->customer_email);?></p>
							</td>
							<td >
								<p ><?php echo($user_accountt->mobile_number);?></p>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-sm-8">
			<h2>Change Your Information</h2>
	    	<form id="main-contact-form" action="{{url('/edit-user')}}" class="contact-form row" name="contact-form" method="post">
	    		{{csrf_field()}}
	            <div class="form-group col-md-7">
	                <input type="text" name="customer_name" class="form-control" value="{{$user_accountt->customer_name}}">
	            </div>
	            <div class="form-group col-md-7">
	                <input type="email" name="customer_email" class="form-control" value="{{$user_accountt->customer_email}}">
	            </div>
	            <div class="form-group col-md-7">
	                <input type="text" name="mobile_number" class="form-control" value="{{$user_accountt->mobile_number}}">
	            </div>
	            <div class="form-group col-md-7">
	                <input type="text" name="password" class="form-control" placeholder="Password">
	            </div>                        
	            <div class="form-group col-md-7">
	                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
	            </div>
	        	</form>
		</div>
	
	</div>

	 <a class="btn btn-default check_out" href="{{url('/checkout')}}">Give Your Delivary Address</a>
</div>

@endsection