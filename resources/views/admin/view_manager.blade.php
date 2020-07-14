@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/dashboard')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a>All Manager List</a></li>
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
								  <th>Manager ID</th>
								  <th>Manager Name</th>
								  <th>Manager email</th>
								  <th>Manager Phone</th>
							  </tr>
						  </thead> 
						  @foreach($all_manager_info as $v_manager)
						  <tbody>
							<tr>
								<td>{{$v_manager->manager_id}}</td>
								<td class="center">{{$v_manager->manager_name}}</td>
								<td class="center">{{$v_manager->manager_email}}</td>
								<td class="center">{{$v_manager->manager_phone}}</td>
							</tr>

						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection