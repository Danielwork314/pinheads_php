<section class="content-header">
	<h1>
		Add food model
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-archive"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food_models/add/<?= $food_id ?>"> Add food model</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Food Model</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>food_models/add/<?= $food_id ?>"
		 enctype="multipart/form-data">
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
				<div id="food_model_wrapper">
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
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</div>
		</form>
	</div>
</section>
<script>
	var model_count = 1;

	function addModel() {
		var html = '<div class="food_model_group" style="display:none;">';
		html += '<div class="form_group">';
		html += '<label for="form_food_model_' + model_count + '">Food Model</label>';
		html +=
			'<input type="text" class="form-control" name="food_model[]" placeholder="Food Model" id="form_food_model_' +
			model_count + '">';
		html += '<div class="help-block with-errors"></div>';
		html += '</div>';
		html += '<div class="form_group">';
		html += '<label for="form_sku_' + model_count + '">SKU</label>';
		html += '<input type="text" class="form-control" name="sku[]" placeholder="SKU" id="form_sku_' + model_count + '">';
		html += '<div class="help-block with-errors"></div>';
		html += '</div>';
		html += '<hr>';
		html += '</div>';

		$('#food_model_wrapper').append(html);
		$('#food_model_wrapper').find(".food_model_group:last").slideDown();

		model_count++;
	}

</script>
