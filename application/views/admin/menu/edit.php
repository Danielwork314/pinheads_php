<section class="content-header">
	<h1>
		Edit menu
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Menu">
				<i class="fa fa-utensils"></i> Menu</a>
		</li>
		<li>
			<a href="<?= base_url() ?>menu/edit/<?= $menu['menu_id'] ?>"> Edit menu</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Menu</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>menu/edit/<?= $menu['menu_id'] ?>" enctype="multipart/form-data">
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
                    <img class="img-thumbnail" src="<?= base_url() . $menu['image'] ?>" style="width:50%; height:50%;">
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="menu" required value="<?= $menu['menu'] ?>">
				</div>
                <div class="form-group">
					<label>Description</label>
					<textarea type="text" class="form-control" name="description" rows="4" required><?= $menu['description'] ?></textarea>
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="text" class="form-control" name="price" id="form_price" required value="<?= $menu['price'] ?>">
				</div>
				<div class="form-group">
					<label>Discounted Price</label>
					<input type="text" class="form-control" name="discounted_price" id="form_discounted_price" required value="<?= $menu['discounted_price'] ?>">
				</div>
				<div class="form-group">
					<label>Discount (%)</label>
					<input type="text" class="form-control" name="discount" id="form_discount" required value="<?= $menu['discount'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>

<script>
 $("#form_discount,#form_discounted_price,#form_price").change(function () {
    var form_discounted_price = $('#form_discounted_price').val();
    var form_price = $('#form_price').val();
    var form_discount =  $('#form_discount');

    var discount = (form_discounted_price/form_price) * 100;
    form_discount.val(discount);

});
</script>