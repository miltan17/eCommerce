@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Dashboard</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Manufactures</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<p class="alert-success">
			<?php
				$message = Session::get('message');

				if($message){
					echo $message;
					Session::put('message',null);
				}
			?>
		</p>

		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Manufacture Id</th>
						<th>Manufacture Name</th>
						<th>Manufacture Description</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($all_manufacture_info as $manufacture)
					<tr>
						<td>{{ $manufacture->manufacture_id }}</td>
						<td class="center">{{$manufacture->manufacture_name}}</td>
						<td class="center">{{$manufacture->manufacture_description}}</td>
						<td class="center">
							@if($manufacture->publication_status == 1)
								<span class="label label-success">Active</span>
							@else
								<span class="label label-danger">InActive</span>
							@endif
						</td>
						<td class="center">
							
							@if($manufacture->publication_status == 1)
								<a class="btn btn-danger" href="{{ URL::to('/unpublish_manufacture/'.$manufacture->manufacture_id) }}">
									<i class="halflings-icon white thumbs-down"></i>
								</a>
							@else
								<a class="btn btn-success" href="{{ URL::to('/publish_manufacture/'.$manufacture->manufacture_id) }}">
									<i class="halflings-icon white thumbs-up"></i>
								</a>
							@endif

							<a class="btn btn-info" href="{{ URL::to('/edit-manufacture/'.$manufacture->manufacture_id) }}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{ URL::to('/delete-manufacture/'.$manufacture->manufacture_id) }}">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
					@endforeach
			</tbody>
		</table>            
	</div>
</div><!--/span-->
@endsection('admin_content')