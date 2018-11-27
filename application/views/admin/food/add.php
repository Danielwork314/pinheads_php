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

					<?= $input_field['food'] ?>
					<?= $input_field['food_category_id'] ?>
					<?= $input_field['description'] ?>
					<?= $input_field['price'] ?>
					<?= $input_field['discounted_price'] ?>
					<?= $input_field['discount'] ?>
					<?= $input_field['store_id'] ?>

					<!-- <div class="form-group">
						<label>Food</label>
						<input type="text" class="form-control" name="food" id="form_food" required placeholder="Food title">
					</div>
					<div class="form-group">
						<label>Food Category</label>
						<select class="form-control" required name="food_category_id" id="form_food_category_id">
							<?php foreach ($food_category as $row) { ?>
								<option value="<?= $row['food_category_id'] ?>"><?= $row['food_category'] ?></option>
							<?php } ?>
						</select>
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
							<?php foreach ($store as $row) { ?>
								<option value="<?= $row['store_id'] ?>"><?= $row['store'] ?></option>
							<?php } ?>
						</select>
					</div> -->
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

    var cal1 = form_price - form_discounted_price;
	var cal2 = (cal1 / form_price);
	var discount = cal2 * 100;
    form_discount.val(Math.round(discount));

});
</script>

<!-- <script>
    $("#submit_food").click(function(e){
 
        var file = $("#file").val();
        var food = $("#form_food").val();
        var description = $("#form_description").val();
        var price = $("#form_price").val();
		var discounted_price = $('#form_discounted_price').val();
        var discount = $("#form_discount").val();
        var food_list = {
            file : file,
            food : food,
            description : description,
            price : price,
			discounted_price : discounted_price,
            discount : discount,
            contentType : false,
            processData : false,
        };
        postParam = {
            food_list : food_list,
        }
        // console.log(postParam);
         $.post("<?= base_url()?>food/add/<?= $store_id ?>", postParam, function(response){
            window.location.replace("<?=base_url()?>store/details/<?= $store_id ?>" );
         });
    });
			
</script> -->
