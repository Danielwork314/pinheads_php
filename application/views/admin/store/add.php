<section class="content-header">
	<h1>
		Add store
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Store">
				<i class="fa fa-archive"></i> Store</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Admin/add"> Add store</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Store</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>store/add" enctype="multipart/form-data">
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
					<label>Store Thumbnail</label>
					<input type="file" class="form-control" name="file" required>
				</div>

				<?= $input_field['store'] ?>
				<?= $input_field['address'] ?>
				<?= $input_field['phone'] ?>
				<?= $input_field['latitude'] ?>
				<?= $input_field['longitude'] ?>
				<?= $input_field['business_hour'] ?>
				<?= $input_field['gourmet_type_id'] ?>
				<?= $input_field['pricing_id'] ?>

				<!-- <div class="form-group">
					<label>Feature</label>
					<?php foreach($feature as $row){ ?>
					<div class="col-3">
						<input type="checkbox" name="feature[]"> <?= $row['feature'] ?>
					</div>
					<?php } ?>
				</div> -->

				<div class="form-group">
					<div class="">
						<input type="checkbox" name="favourite" value="favourite"> Favourite
					</div>
				</div>
                
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
