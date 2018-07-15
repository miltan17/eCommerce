@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Dashboard</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add Category</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<!-- <p class="alert-success">
			<?php
				$message = Session::get('message');

				if($message){
					echo $message;
					Session::put('message',null);
				}
			?>
		</p> -->
		<div class="box-content">
			<form class="form-horizontal" action="{{ URL::to('/save-category')}}" method="post">
				{{ csrf_field() }}
				<fieldset>

					<div class="control-group">
						<label class="control-label" for="typeahead">Category Name </label>
						<div class="controls">
							<input type="text" class="span6 typeahead" name="category_name" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="textarea2">Description</label>
						<div class="controls">
							<textarea class="cleditor" id="textarea2" rows="3" name="category_description" required></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="typeahead"> Publication Status</label>
						<div class="controls">
							<input type="checkbox" name="publication_status" value="1">
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection('admin_content')