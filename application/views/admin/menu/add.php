<section class="content-header">
	<h1>
		Add Menu
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Menu">
				<i class="fa fa-utensils"></i> Menu</a>
		</li>
		<li>
			<a href="<?= base_url() ?>menu/add"> Add menu</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Menu</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>menu/add/<?= $store_id ?>" enctype="multipart/form-data">
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
					<label>Menu Image</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<?= $input_fields['menu'] ?>
				<?= $input_fields['description'] ?>
				<?= $input_fields['price'] ?>
				<?= $input_fields['discount'] ?>
				
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
