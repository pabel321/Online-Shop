@extends('manager_layout')
@section('manager_content')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{URL::to('/manager-page')}}">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a>All Subscriber</a></li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>All Subscriber List</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Subscriber ID</th>
						  <th>Subscriber Email</th>
					  </tr>
				  </thead> 
				  @foreach($all_subscriber_info as $v_subscriber)
				  <tbody>
					<tr>
						<td>{{$v_subscriber->subscribe_id}}</td>
						<td class="center">{{$v_subscriber->subscriber_email}}</td>
					</tr>

				  </tbody>
				  @endforeach
			  </table>            
			</div>
		</div><!--/span-->
	
	</div><!--/row-->




@endsection