<section class="content-header">
	<h1>
		Add store images
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Store">
				<i class="fa fa-archive"></i> Store</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Store_images/add/<?= $store_id?> "> Add store images</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Store images</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>store_images/add/<?= $store_id ?>"
		 enctype="multipart/form-data">
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

				<div class="form_group">
					<label for="form_store_images">Store Images</label>
					<input type="file" class="form-control image_input_multiple" name="store_images[]" multiple placeholder="Store Images">
					<div class="help-block with-errors"></div>
					<div class="row" id="preview_store_images">

					</div>
				</div>
				<input type="hidden" name="dummy" value="why are you looking at this?">
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
		</form>
	</div>
</section>
