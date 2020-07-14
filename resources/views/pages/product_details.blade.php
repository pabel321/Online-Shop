@extends('layout')
@section('content')

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($product_by_details->product_image)}}" style="height: 255px" alt="" />
								<h3>NI-BIZ</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{URL::to('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$product_by_details->product_name}}</h2>
								<p>Color: {{$product_by_details->product_color}}</p>
								<span>
									<span>{{$product_by_details->product_price}} TK</span>
								<form action="{{url('/add-to-cart')}}" method="post">
										{{ csrf_field() }}
									<label>Quantity:</label>
									<input name="quantity" type="number" value="1" min="1" />
									<input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{$product_by_details->manufacture_name}}</p>
								<p><b>Category:</b> {{$product_by_details->category_name}}</p>
								<p><b>Size:</b> {{$product_by_details->product_size}}</p>
								<a href="https://www.facebook.com/"><img src="{{URL::to('frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							<?php 	
									$customer_id=Session::get('customer_id');
                                    $review_id=Session::get('review_id');
                             ?>
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#comments" data-toggle="tab">Comments</a></li>
								 <?php if($customer_id != NULL && $review_id ==NULL) {?>
								<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
								<?php } else {?>
								<?php } ?>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<p><?php echo strip_tags($product_by_details->product_long_description,'<br>'); ?></p>
							</div>
							<div class="tab-pane fade active in" id="companyprofile" >
								<p>Present time technologies have increased the ease of access for consumers to shop online resulting in more retailers offering ship to store or ship to home options. 96% of consumers are more likely to shop on site if free shipping is being offered.</p>
							</div>
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><i class="fa fa-user"></i> NI-BIZ</li>
										<li id="demo"><i class="fa fa-clock-o"></i></li>
									</ul>
									<p>Feel-good shopping</p>
									<p><b>Write Your Review</b></p>
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
									<form action="{{url('save-review')}}" method="post">
										{{csrf_field()}}
										<input type="hidden" name="product_id" value="{{$product_by_details->product_id}}" />
										<span>
										<input type="text" name="reviewer_name" placeholder="Your Name"/>
										</span>
										
										<textarea name="reviewer_feedback" ></textarea>
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							<div class="tab-pane fade" id="comments" >
								<div class="media commnets">
									<div class="media-body">
										<?php
                                    $all_published_review=DB::table('tbl_review')
                                                        ->where('product_id',$product_by_details->product_id)
                                                        ->get();
                                    foreach($all_published_review as $v_review){?>
										<h4 class="media-heading">{{$v_review->reviewer_name}}</h4>
										<p>{{$v_review->reviewer_feedback}}</p>
										<?php } ?>
									</div>

								</div><!--Comments-->
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>

<script>
var d = new Date();
document.getElementById("demo").innerHTML = d;
</script>


 @endsection