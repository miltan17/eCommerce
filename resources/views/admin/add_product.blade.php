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
		<a href="#">Add Product</a>
	</li>
</ul>

<p class="alert-success">
	<?php 
	$message = Session::get('message');
	if($message){
		echo $message;
		Session::put('message', null);
	} ?>
</p>


<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-content">
			<form class="form-horizontal" action="{{ URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>

					<div class="control-group">
						<label class="control-label" for="typeahead">Product Name </label>
						<div class="controls">
							<input type="text" class="span6 typeahead" name="product_name" placeholder="Enter product name ..." required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="selectError3">Product Category</label>
						<div class="controls">
						  	<select id="selectError3" name="category_id" required="">
								<option>Select an option</option>
								<?php 
									$categories = DB::table('tbl_category')->where('publication_status', 1)->get();
									foreach ($categories as $category) {
								 ?>
										<option value="{{$category->category_id}}">{{$category->category_name}}</option>
								<?php } ?>
						  	</select>
						</div>
				    </div>


					<div class="control-group">
						<label class="control-label" for="selectError3">Product Brand</label>
						<div class="controls">
						  	<select id="selectError3" name="manufacture_id" required="">
								<option>Select an option</option>
								<?php 
									$manufactures = DB::table('tbl_manufacture')->where('publication_status', 1)->get();
									foreach ($manufactures as $manufacture) {
								 ?>
										<option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
								<?php } ?>
						  	</select>
						</div>
				    </div>

					<div class="control-group">
						<label class="control-label" for="textarea2">Short Description</label>
						<div class="controls">
							<textarea class="cleditor" id="textarea2" rows="3" name="product_short_description" required></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="textarea2">Long Description</label>
						<div class="controls">
							<textarea class="cleditor" id="textarea2" rows="3" name="product_long_description" required></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="focusedInput">Price</label>
						<div class="controls">
							<input class="input-xlarge focused" id="focusedInput" type="text" name="product_price" placeholder="Enter Price ..." required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Upload Image</label>
						<div class="controls">
							  <input type="file" name="product_image">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="focusedInput">Size</label>
						<div class="controls">
							<input class="input-xlarge focused" id="focusedInput" type="text" name="product_size" placeholder="Enter size ...">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="focusedInput">Color</label>
						<div class="controls">
							<input class="input-xlarge focused" id="focusedInput" type="text" name="product_color" placeholder="Enter color ...">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="focusedInput">Amount</label>
						<div class="controls">
							<input class="input-xlarge focused" id="focusedInput" type="text" name="product_amount" placeholder="Enter amount ...">
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