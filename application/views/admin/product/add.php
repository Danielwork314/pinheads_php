<section class="content-header">
	<h1>
		Add product
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Product">
				<i class="fa fa-archive"></i> Product</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Product/add"> Add product</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Product</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>product/add" enctype="multipart/form-data">
			<div class="container-fluid">
				<br /><br />
				<ul class="list-unstyled multi-steps">
					<li class="step_url is-active" id="step_link_1" onclick="changeStep(1)">Add Product Details</li>
					<li class="step_url" id="step_link_2" onclick="changeStep(2)">Add Product Modals</li>
					<li class="step_url" id="step_link_3" onclick="changeStep(3)">Add Product Images</li>
				</ul>
			</div>
			<hr>
			<div class="box-body">
				<?php 
				if (isset($error)) { 
					?>
				<div class="alert alert-danger alert-dismissable">
					<?= $error; ?>
				</div>
				<?php 
				}
				?>
				<div class="step_content" id="step_1">
					<?= $input_field['thumbnail'] ?>
					<?= $input_field['product'] ?>
					<?= $input_field['product_category_id'] ?>
					<?= $input_field['price'] ?>
					<?= $input_field['description'] ?>
					<button type="button" class="btn btn-primary pull-right" onclick="changeStep(2)">Next</button>
				</div>
				<div class="step_content hidden_step" id="step_2">
					<div id="product_model_wrapper">
					</div>
					<button type="button" class="btn btn-primary pull-right" onclick="addModel()">Add Model</button>
					<br>
					<br>
					<!-- <div class="form_group">
						<label for="form_product_model_1">Product Model</label>
						<input type="text" class="form-control" name="product_model[]" placeholder="Product Model" id="form_product_model_1">
						<div class="help-block with-errors"></div>
					</div>
					<div class="form_group">
						<label for="form_sku_1">SKU</label>
						<input type="text" class="form-control" name="sku[]" placeholder="SKU" id="form_sku_1">
						<div class="help-block with-errors"></div>
					</div> -->
					<button type="button" class="btn btn-primary" onclick="changeStep(1)">Previous</button>
					<button type="button" class="btn btn-primary pull-right" onclick="changeStep(3)">Next</button>
				</div>
				<div class="step_content hidden_step" id="step_3">
					<div class="form_group">
						<label for="form_product_images">Product Images</label>
						<input type="file" class="form-control image_input_multiple" name="product_images[]" multiple placeholder="Product Images">
						<div class="help-block with-errors"></div>
						<div class="row" id="preview_product_images">

						</div>
					</div>
					<button type="button" class="btn btn-primary" onclick="changeStep(2)">Previous</button>
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
			</div>
		</form>
	</div>
</section>
<script>
	var model_count = 1;

	function addModel(){
		var html = '<div class="product_model_group" style="display:none;">';
		html += '<div class="form_group">';
		html += '<label for="form_product_model_' + model_count + '">Product Model</label>';
		html += '<input type="text" class="form-control" name="product_model[]" placeholder="Product Model" id="form_product_model_' + model_count + '">';
		html += '<div class="help-block with-errors"></div>';
		html += '</div>';
		html += '<div class="form_group">';
		html += '<label for="form_sku_' + model_count + '">SKU</label>';
		html += '<input type="text" class="form-control" name="sku[]" placeholder="SKU" id="form_sku_' + model_count + '">';
		html += '<div class="help-block with-errors"></div>';
		html += '</div>';
		html += '<hr>';
		html += '</div>';

		$('#product_model_wrapper').append(html);
        $('#product_model_wrapper').find(".product_model_group:last").slideDown();

		model_count++;
	}
</script>
