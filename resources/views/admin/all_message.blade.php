@extends('admin_layout')
@section('admin_content')

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{URL::to('/dashboard')}}">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a >Inbox</a></li>
	</ul>

	<div class="row-fluid">
		
		<div class="span12">
			<h1>Inbox</h1>
			
			<ul class="messagesList">
				@foreach($all_message_info as $v_message)
				<li>
					<a href="{{URL::to('/view-message-detail/'.$v_message->contact_id)}}">
					<span class="from"><span class="glyphicons star"><i></i></span> {{$v_message->name}} <span class="glyphicons"><i></i></span>
					</span><span class="title"><span class="label label-warning">{{$v_message->subject}}</span> {{$v_message->message}}</span><span class="date">{{$v_message->created_at}}</span>
					</a>
				</li>
				 @endforeach
			</ul>
				
		</div>
	</div>


@endsection