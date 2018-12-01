<section class="content-header">
	<h1>
		Edit Feature
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>feature">
				<i class="fa fa-money-bill-alt"></i> Feature</a>
		</li>
		<li>
			<a href="<?= base_url() ?>feature/edit/<?= $feature['feature_id'] ?>"> Edit feature</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>feature/edit/<?= $feature['feature_id'] ?>" enctype="multipart/form-data">
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
                <?= $input_field['feature'] ?>
				<!-- <div class="form-group">
					<label>Feature Title</label>
					<input type="text" class="form-control" name="feature" required value="<?= $feature['feature'] ?>">
				</div> -->
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
