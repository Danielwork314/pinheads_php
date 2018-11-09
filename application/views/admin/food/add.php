<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		Add Food
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-utensils"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>food/add"> Add food</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Food</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" class="input_form" method="POST" action="<?= base_url()?>food/add" enctype="multipart/form-data">
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

					<div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control" name="file" id="file" required>
					</div>
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="food" id="form_food" required placeholder="Food title">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea type="text" class="form-control" name="description" id="form_description" rows="4" required placeholder="Food description"></textarea>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control" name="price" id="form_price" required placeholder="Food Price">
					</div>
					<div class="form-group">
						<label>Discounted Price</label>
						<input type="text" class="form-control" name="discounted_price" id="form_discounted_price" required placeholder="Discounted Price">
					</div>
					<div class="form-group">
						<label>Discount (%)</label>
						<input type="text" class="form-control" name="discount" id="form_discount" required placeholder="Food discount">
					</div>
					<div class="form-group">
						<label>Store</label>
						<select class="form-control" required name="store_id" id="form_store_id">
							<option value="none">None</option>
								<?php foreach ($store as $row) { ?>
									<option value="<?= $row['store_id'] ?>"><?= $row['store'] ?></option>
								<?php } ?>
						</select>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" id="submit_food" class="btn btn-primary pull-right">Submit</button>
				</div>
			</form>
		</div>
	</div>
</section>
</div>
<script>
 $("#form_discount,#form_discounted_price,#form_price").change(function () {
    var form_discounted_price = $('#form_discounted_price').val();
    var form_price = $('#form_price').val();
    var form_discount =  $('#form_discount');

    var discount = (form_discounted_price/form_price) * 100;
    form_discount.val(discount);

});
</script>