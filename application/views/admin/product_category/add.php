<section class="content-header">
	<h1>
		Add admin
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Admin">
				<i class="fa fa-user-secret"></i> Admin</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Admin/add"> Add admin</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>product_category/add">
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
				<?= $input_field['product_category'] ?>
				<?= $input_field['parent_id'] ?>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
