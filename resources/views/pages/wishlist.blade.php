@extends('layout')
@section('content')


<section id="cart_items">
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
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Wishlist</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($all_wishlist_info as $v_wishlist) {?>

						<tr>
							<td class="cart_product">
								<a><img src="{{URL::to($v_wishlist->product_image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4>{{$v_wishlist->product_name}}</h4>
							</td>
							<td class="cart_price">
								<p>TK {{$v_wishlist->product_price}}</p>
							</td>
							<td class="cart_wishlist">
								<a class="view_wishlist" href="{{URL::to('/view_product/'.$v_wishlist->product_id)}}"><i class="fa fa fa-eye"></i></a>||
								<a class="delete_wishlist" href="{{URL::to('/delete-wishlist/'.$v_wishlist->wishlist_id)}}"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#Wishlist_items-->


@endsection