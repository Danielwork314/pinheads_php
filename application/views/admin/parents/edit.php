<section class="content-header">
	<h1>
		Edit parent
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Parents">
				<i class="fa fa-genderless"></i> Parent</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Parents/edit/<?= $parents['parents_id'] ?>"> Edit parent</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Parent</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url() ?>parents/edit/<?= $parents['parents_id']?>">
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
