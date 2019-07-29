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
		<a href="#">Add Product</a>
	</li>
</ul>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
			
			<p class=" alert-success">
				<?php
				$message=Session::get('message');
				if ($message) {
					echo $message;
					Session::put('message',NULL);
				}
				?>
			</p>
			
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="/save-product" method="post" enctype="multipart/from-data">
				@csrf
				<fieldset>
					
					<div class="control-group">
						<label class="control-label" for="date01">Product Name</label>
						<div class="controls">
							<input type="text" class="input-xlarge " name="product_name"  >
						</div>
					</div>
					<div class="control-group">
						<label for="" class="control-label">Category Name</label>
						<div class="controls">
							<select name="category_id" >
								<?php
								$category_name=DB::table('tbl_category')
								->where('publish_status',1)
								->get();
								foreach ($category_name as $v_catname) {
									?>
									<option value="{{$v_catname->category_id}}">{{$v_catname->category_name}}</option>
									<?php
								}
								?>
								
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="" class="control-label">Manufacture Name</label>
						<div class="controls">
							<select name="manufacture_id" >
								<?php
								$manufacture_name=DB::table('manufacture')
								->where('publish_status',1)
								->get();
								foreach ($manufacture_name as $v_manufacture ) {?>
								<option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Short Description </label>
						<div class="controls">
							<textarea class="cleditor" name="product_short_description" rows="3" ></textarea>
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Long Description </label>
						<div class="controls">
							<textarea class="cleditor" name="product_long_description" rows="3" ></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Product Price</label>
						<div class="controls">
							<input type="text" class="input-xlarge " name="product_price" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Image Upload</label>
						<div class="controls">
							<input type="file" class="input-file uniform_on" name="pruduct_image"  >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Product Size</label>
						<div class="controls">
							<input type="text" class="input-xlarge " name="pruduct_size" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Product Color</label>
						<div class="controls">
							<input type="text" class="input-xlarge " name="pruduct_color" >
						</div>
					</div>


					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Publish Status</label>
						<div class="controls">
							<input type="checkbox" name="pulished_status" value="1"  >
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Add Product</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div><!--/span-->
</div><!-
@endsection