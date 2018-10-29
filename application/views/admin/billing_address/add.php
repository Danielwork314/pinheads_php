<section class="content-header">
	<h1>
		Add Billing Address
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>billing_address">
				<i class="fa fa-gift"></i> Billing Address</a>
		</li>
		<li>
			<a href="<?= base_url() ?>billing_address/add"> Add billing address</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Billing Address</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>billing_address/add" enctype="multipart/form-data">
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
					<label>Coupon Title</label>
					<input type="text" class="form-control" name="notificaiton_title" required placeholder="Coupon title">
				</div>
                <div class="form-group">
					<label>Coupon Description</label>
					<input type="text" class="form-control" name="coupon_description" required placeholder="Coupon description">
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
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
