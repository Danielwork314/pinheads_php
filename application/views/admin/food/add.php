<section class="content-header">
	<h1>
		Add Food
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-user-secret"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Admin/add"> Add food</a>
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
					<label>Food Image</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<div class="form-group">
					<label>Food Title</label>
					<input type="text" class="form-control" name="food_title" required placeholder="Food title">
				</div>
                <div class="form-group">
					<label>Food Description</label>
					<input type="text" class="form-control" name="food_description" required placeholder="Food description">
				</div>
				<div class="form-group">
					<label>Food Price</label>
					<input type="text" class="form-control" name="food_price" required placeholder="Food Price">
				</div>
				<div class="form-group">
					<label>Food Discount</label>
					<input type="text" class="form-control" name="food_discount" required placeholder="Food discount">
				</div>
				<div class="form-group">
					<label>Store</label>
					<select class="form-control" required name="store_id" id="form_store_id">
                        <option value="none">None</option>
                            <?php foreach ($store as $row) { ?>
                                <option value="<?= $row['store_id'] ?>"><?= $row['store_title'] ?></option>
                            <?php } ?>
                    </select>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
