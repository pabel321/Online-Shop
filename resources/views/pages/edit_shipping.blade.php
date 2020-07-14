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

<div class="col-sm-12">
	<h2>Change Your Information</h2>
	<form id="main-contact-form" action="{{url('/edit-shipping')}}" class="contact-form row" name="contact-form" method="post">
		{{csrf_field()}}
        <div class="form-group col-md-7">
            <input type="email" name="shipping_email" class="form-control" value="{{$user_shipping->shipping_email}}">
        </div>
        <div class="form-group col-md-7">
            <input type="text" name="shipping_first_name" class="form-control" value="{{$user_shipping->shipping_first_name}}">
        </div>
        <div class="form-group col-md-7">
            <input type="text" name="shipping_last_name" class="form-control" value="{{$user_shipping->shipping_last_name}}">
        </div>
        <div class="form-group col-md-7">
            <input type="text" name="shipping_address" class="form-control" value="{{$user_shipping->shipping_address}}">
        </div>
        <div class="form-group col-md-7">
            <input type="text" name="shipping_mobile_number" class="form-control" value="{{$user_shipping->shipping_mobile_number}}">
        </div>  
        <div class="form-group col-md-7">
            <input type="text" name="shipping_city" class="form-control" value="{{$user_shipping->shipping_city}}">
        </div>                    
        <div class="form-group col-md-7">
            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
        </div>
    	</form>
</div>

@endsection