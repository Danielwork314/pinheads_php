<section class="content-header">
	<h1>
		Edit food
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-utensils"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food/edit/<?= $food['food_id'] ?>"> Edit food</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Food</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>food/edit/<?= $food['food_id'] ?>" enctype="multipart/form-data">
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
                    <img class="img-thumbnail" src="<?= base_url() . $food['image'] ?>" style="width:50%; height:50%;">
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" class="form-control" name="file" required>
				</div>

				<?= $input_field['food'] ?>
				<?= $input_field['food_category_id'] ?>
				<?= $input_field['description'] ?>
				<?= $input_field['price'] ?>
				<?= $input_field['discounted_price'] ?>
				<?= $input_field['discount'] ?>
				<?= $input_field['store_id'] ?>

				<!-- <div class="form-group">
					<label>Food Category</label>
                    <select class="form-control" required name="food_category_id" id="form_food_category_id">
                        <option value="none">None</option>
                        <?php foreach ($food_category as $row) { ?>
                            <option value="<?= $row['food_category_id'] ?>" <?php if($row['food_category_id'] == $food['food_category_id']){ ?> selected <?php } ?>><?= $row['food_category'] ?></option>
                        <?php } ?>
                    </select>
				</div>
				<div class="form-group">
					<label>Food</label>
					<input type="text" class="form-control" name="food" required value="<?= $food['food'] ?>">
				</div>
                <div class="form-group">
					<label>Description</label>
					<textarea type="text" class="form-control" name="description" rows="4" required><?= $food['description'] ?></textarea>
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="text" class="form-control" name="price" id="form_price" required value="<?= $food['price'] ?>">
				</div>
				<div class="form-group">
					<label>Discounted Price</label>
					<input type="text" class="form-control" name="discounted_price" id="form_discounted_price" required value="<?= $food['discounted_price'] ?>">
				</div>
				<div class="form-group">
					<label>Discount (%)</label>
					<input type="text" class="form-control" name="discount" id="form_discount" required value="<?= $food['discount'] ?>">
				</div>
				<div class="form-group">
					<label>Store</label>
                    <select class="form-control" required name="store_id" id="form_store_id">
                        <option value="none">None</option>
                        <?php foreach ($store as $row) { ?>
                            <option value="<?= $row['store_id'] ?>" <?php if($row['store_id'] == $food['store_id']){ ?> selected <?php } ?>><?= $row['store'] ?></option>
                        <?php } ?>
                    </select>
				</div> -->
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

    var cal1 = form_price - form_discounted_price;
	var cal2 = (cal1 / form_price);
	var discount = cal2 * 100;
    form_discount.val(Math.round(discount));

});
</script>