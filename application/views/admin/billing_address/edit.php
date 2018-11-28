<section class="content-header">
	<h1>
		Edit billing address
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>User">
				<i class="fa fa-users"></i> User</a>
		</li>
		<li>
			<a href="<?= base_url() ?>User/details/<?= $user['user_id'] ?>">
				<?= $user['username'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>billing_address/details/<?= $billing_address['billing_address_id'] ?>">
				<?= $billing_address['address1'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>billing_address/edit/<?= $billing_address['billing_address_id'] ?>"> Edit billing address</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>billing_address/edit/<?= $billing_address['billing_address_id'] ?>" enctype="multipart/form-data">
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
				
                <!-- <?= $input_field['address1'] ?>
				<?= $input_field['address2'] ?>
				<?= $input_field['state'] ?>
				<?= $input_field['postcode'] ?>
				<?= $input_field['country'] ?> -->
				
				<div class="form-group">
					<label>Address 1</label>
					<input type="text" class="form-control" name="address1" required value="<?= $billing_address['address1'] ?>">
				</div>
                <div class="form-group">
					<label>Address 2</label>
					<input type="text" class="form-control" name="address2" required value="<?= $billing_address['address2'] ?>">
				</div>
                <div class="form-group">
					<label>State</label>
					<input type="text" class="form-control" name="state" required value="<?= $billing_address['state'] ?>">
				</div>
                <div class="form-group">
					<label>Postcode</label>
					<input type="text" class="form-control" name="postcode" required value="<?= $billing_address['postcode'] ?>">
				</div>
                <div class="form-group">
					<label>Country</label>
					<input type="text" class="form-control" name="country" required value="<?= $billing_address['country'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
