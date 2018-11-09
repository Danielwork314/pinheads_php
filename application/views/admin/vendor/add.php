<section class="content-header">
	<h1>
		Add Vendor
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Vendor">
				<i class="fa fa-user"></i> Vendor</a>
		</li>
		<li>
			<a href="<?= base_url() ?>vendor/add"> Add Vendor</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Vendor</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>vendor/add" enctype="multipart/form-data">
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
					<label>Profile Picture</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<?= $input_field['username'] ?>
				<?= $input_field['name'] ?>
				<?= $input_field['email'] ?>
				<?= $input_field['contact'] ?>
				<?= $input_field['password'] ?>
				<?= $input_field['password2'] ?>
				<?= $input_field['role_id'] ?>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
