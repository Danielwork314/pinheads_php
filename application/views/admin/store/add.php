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
					<label>Store Title</label>
					<input type="text" class="form-control" name="store" required placeholder="Store">
				</div>
				<div class="form-group">
					<label>Store Address</label>
					<input type="text" class="form-control" name="address" required placeholder="Store Address">
				</div>
				<div class="form-group">
					<label>Social Media Link</label>
					<input type="text" class="form-control" name="social_media_link" required placeholder="Social Media Link">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" class="form-control" name="phone" required placeholder="Phone number">
				</div>
				<div class="form-group">
					<label>Latitude</label>
					<input type="text" class="form-control" name="latitude" required placeholder="Latitude">
				</div>
				<div class="form-group">
					<label>Longitude</label>
					<input type="text" class="form-control" name="longitude" required placeholder="Lognitude">
				</div>
				<div class="form-group">
					<label>Business Hour</label>
					<input type="text" class="form-control" name="business_hour" required placeholder="Business hour">
				</div>
				<div class="form-group">
					<label>Gourmet Type</label>
					<select class="form-control" name="gourmet_type_id">
						<?php foreach($type as $row) { ?>
						<option value="<?= $row['gourmet_type_id'] ?>"><?= $row['gourmet_type'] ?></option>
						<?php } ?>
					</select> 
				</div>
				<div class="form-group">
					<label>Pricing</label>
					<select class="form-control" name="pricing_id">
						<?php foreach($price as $row) { ?>
						<option value="<?= $row['pricing_id'] ?>"><?= $row['pricing'] ?></option>
						<?php } ?>
					</select> 
				</div> -->
				<div class="form-group">
					<!-- <div class="">
						<input type="checkbox" name="take_away" value="take_away"> Take Away
					</div>
					<div class="">
						<input type="checkbox" name="dine_in" value="dine_in"> Dine In
					</div>
					<div class="">
						<input type="checkbox" name="halal" value="halal"> Halal
					</div>
					<div class="">
						<input type="checkbox" name="vegetarian" value="vegetarian"> Vegetarian
					</div> -->
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
