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
		<a href="#">Add Slider</a>
	</li>
</ul>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
			
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
			<form class="form-horizontal" action="/save-slider" method="post" enctype='multipart/form-data'>
				@csrf
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="date01">Image Upload</label>
						<div class="controls">
							<input type="file" class="input-file uniform_on" name="slider_image" required="" >
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Publish Status</label>
						<div class="controls">
							<input type="checkbox" name="slider_publish_satus" value="1"  >
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Add Slider</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div><!--/span-->
</div><!-
@endsection