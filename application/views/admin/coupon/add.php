<section class="content-header">
	<h1>
		Add Coupon
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>coupon">
				<i class="fa fa-gift"></i> Coupon</a>
		</li>
		<li>
			<a href="<?= base_url() ?>coupon/add"> Add coupon</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Coupon</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>coupon/add" enctype="multipart/form-data">
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
					<label>Coupon</label>
					<input type="text" class="form-control" name="coupon" required placeholder="Coupon title">
				</div>
                <div class="form-group">
					<label>Coupon Description</label>
					<input type="text" class="form-control" name="description" required placeholder="Coupon description">
				</div>
				<div class="form-group">
					<label>Valid Date</label>
					<input type="date" class="form-control" name="valid_date" required placeholder="Valid date">
				</div>
                <div class="form-group">
					<label>Partner Coupon</label>
					<input type="text" class="form-control" name="valid_date" required placeholder="Valid date">
				</div>
                <div class="form-group">
					<label>Used</label>
					<input type="text" class="form-control" name="used" required placeholder="Used">
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
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
