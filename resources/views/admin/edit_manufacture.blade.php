@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Update Manufacture</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-content">
			<form class="form-horizontal" action="{{ URL::to('/update-manufacture',$manufacture_info->manufacture_id) }}" method="post">
				{{ csrf_field() }}
				<fieldset>

					<div class="control-group">
						<label class="control-label" for="typeahead">Manufacture Name </label>
						<div class="controls">
							<input type="text" class="span6 typeahead" name="manufacture_name" value="{{ $manufacture_info->manufacture_name }}" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="textarea2">Description</label>
						<div class="controls">
							<textarea class="cleditor" id="textarea2" rows="3" name="manufacture_description" required>
								{{ $manufacture_info->manufacture_description }}
							</textarea>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection('admin_content')