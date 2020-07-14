@extends('manager_layout')
@section('manager_content')

<div class="row-fluid">
				<div class="box span8" onTablet="span8" onDesktop="span8">
					<div class="box-header">
						<h2><i class="halflings-icon comment"></i><span class="break"></span>Product Review</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="chat">
							@foreach($all_reviewer_comment as $v_comment)
							<li class="left">
								<img class="avatar" alt="Lucas" src="{{URL::to($v_comment->product_image)}}">
								<span class="message"><span class="arrow"></span>
									<span class="from">{{$v_comment->reviewer_name}}</span>
									<span class="time">{{$v_comment->created_at}}</span>
									<span class="text">
										{{$v_comment->reviewer_feedback}}
									</span>
								</span>	                                  
							</li>
							@endforeach
						</ul>
					</div>
				</div><!--/span-->
			
			</div>

@endsection