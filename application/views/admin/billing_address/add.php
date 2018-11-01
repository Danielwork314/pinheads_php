<section class="content-header">
	<h1>
		Add Billing Address
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>billing_address">
				<i class="far fa-address-book"></i> Billing Address</a>
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
					<label>Address 1</label>
					<input type="text" class="form-control" name="address1" required placeholder="Address 1">
				</div>
                <div class="form-group">
					<label>Address 2</label>
					<input type="text" class="form-control" name="address2" required placeholder="Address 2">
				</div>
				<div class="form-group">
					<label>State</label>
					<input type="text" class="form-control" name="state" required placeholder="State">
				</div>
                <div class="form-group">
					<label>Postcode</label>
					<input type="text" class="form-control" name="postcode" required placeholder="Postcode">
				</div>
                <div class="form-group">
					<label>Country</label>
					<input type="text" class="form-control" name="country" required placeholder="Country">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
