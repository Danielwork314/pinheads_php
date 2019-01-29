<section class="content-header">
	<h1>
		Add teacher
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Teacher">
				<i class="fa fa-genderless"></i> Teacher</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Teacher/add"> Add teacher</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Teacher</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>Teacher/add">
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
