@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/dashboard')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a>All Customer List</a></li>
			</ul>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Customer ID</th>
								  <th>Customer Name</th>
								  <th>Customer email</th>
							  </tr>
						  </thead> 
						  @foreach($all_user_info as $v_customer)
						  <tbody>
							<tr>
								<td>{{$v_customer->customer_id}}</td>
								<td class="center">{{$v_customer->customer_name}}</td>
								<td class="center">{{$v_customer->customer_email}}</td>
							</tr>

						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection