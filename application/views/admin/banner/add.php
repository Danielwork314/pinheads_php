<section class="content-header">
	<h1>
		Add Banner Title
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>banner">
				<i class="fa fa-image"></i> Banner</a>
		</li>
		<li>
			<a href="<?= base_url() ?>banner/add"> Add Banner Title</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Price</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>banner/add" enctype="multipart/form-data">
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
				<?= $input_field['image'] ?>
				<input type="hidden" name="dummy" value="why are you looking at this?">
				<!-- <div class="form-group">
					<label>Banner Title</label>
					<input type="text" class="form-control" name="banner" required placeholder="Banner title">
				</div> -->
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
