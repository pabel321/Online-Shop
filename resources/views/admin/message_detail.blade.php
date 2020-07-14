@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{URL::to('/view-message')}}">inbox</a>
	<i class="icon-angle-right"></i>
	</li>
	<li><a>Messages</a></li>
</ul>

<div class="row-fluid">
		<div class="span10 noMarginLeft">
			
			<div class="message dark">
				
				<div class="header">
					<h1>{{$all_message_detail->subject}}</h1>
					<div class="from"><i class="halflings-icon user"></i> <b>{{$all_message_detail->name}}</b> / {{$all_message_detail->email}}</div>
					<div class="date"><i class="halflings-icon time"></i> {{$all_message_detail->created_at}}</div>
					
					<div class="menu"></div>
					
				</div>
				
				<div class="content">
					<blockquote>
						{{$all_message_detail->message}}
					</blockquote>
				</div>
			</div>	
			
		</div>
				
	</div>

@endsection