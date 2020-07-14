@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/dashboard')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a>Add Manager</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Manager</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
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
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save-manager')}}" method="post">
							{{ csrf_field()}}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Manager Email</label>
							  <div class="controls">
								<input type="email" class="input-xlarge " name="manager_email" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Manager Password</label>
							  <div class="controls">
								<input type="password" class="input-xlarge " name="manager_password" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Manager Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="manager_name" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Manager Phone Number</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="manager_phone" required="">
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Manager</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection