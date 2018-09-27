<section class="content-header">
	<h1>
		Edit product
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Product">
				<i class="fa fa-archive"></i> Product</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Product/edit/<?= $product['product_id'] ?>"> Edit product</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>product/edit/<?= $product['product_id'] ?>"
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
				<?= $input_field['thumbnail'] ?>
				<?= $input_field['product'] ?>
				<?= $input_field['product_category_id'] ?>
				<?= $input_field['price'] ?>
				<?= $input_field['description'] ?>
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
		var html = '<div class="product_model_group" style="display:none;">';
		html += '<div class="form_group">';
		html += '<label for="form_product_model_' + model_count + '">Product Model</label>';
		html +=
			'<input type="text" class="form-control" name="product_model[]" placeholder="Product Model" id="form_product_model_' +
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

		$('#product_model_wrapper').append(html);
		$('#product_model_wrapper').find(".product_model_group:last").slideDown();

		model_count++;
	}

</script>
