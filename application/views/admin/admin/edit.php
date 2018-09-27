<section class="content-header">
	<h1>
		Edit admin
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Admin">
				<i class="fa fa-user-secret"></i> Admin</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Admin/edit/<?= $admin['admin_id'] ?>"> Edit admin</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Admin</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url() ?>admin/edit/<?= $admin['admin_id']?>">
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
				<?= $input_field['username'] ?>
				<?= $input_field['name'] ?>
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
