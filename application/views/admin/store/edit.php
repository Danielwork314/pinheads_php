<section class="content-header">
	<h1>
		Edit store
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Store">
				<i class="fa fa-archive"></i> Store</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Store/edit/<?= $store['store_id'] ?>"> Edit store</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>store/edit/<?= $store['store_id'] ?>" enctype="multipart/form-data">
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
                    <img class="img-thumbnail" src="<?= base_url() . $store['thumbnail'] ?>" style="width:50%; height:50%;">
				</div>
				<div class="form-group">
					<label>Store Thumbnail</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<div class="form-group">
					<label>Store</label>
					<input type="text" class="form-control" name="store" required value="<?= $store['store'] ?>">
				</div>
				<div class="form-group">
					<label>Store Address</label>
					<input type="text" class="form-control" name="address" required value="<?= $store['address'] ?>">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" class="form-control" name="phone" required value="<?= $store['phone'] ?>">
				</div>
				<div class="form-group">
					<label>Latitude</label>
					<input type="text" class="form-control" name="latitude" required value="<?= $store['latitude'] ?>">
				</div>
				<div class="form-group">
					<label>Longitude</label>
					<input type="text" class="form-control" name="longitude" required value="<?= $store['longitude'] ?>">
				</div>
				<div class="form-group">
					<label>Business Hour</label>
					<input type="text" class="form-control" name="business_hour" required value="<?= $store['business_hour'] ?>">
				</div>
				<div class="form-group">
					<label>Gourmet Type</label>
					<select class="form-control" name="gourmet_type_id">
						<?php foreach($type as $row) { ?>
                        <option value="<?= $row['gourmet_type_id'] ?>" <?php if($store['gourmet_type_id'] == $row['gourmet_type_id']) { ?> selected <?php } ?>><?= $row['gourmet_type_title'] ?></option>
						<?php } ?>
					</select> 
				</div>
				<div class="form-group">
					<label>Pricing</label>
					<select class="form-control" name="pricing_id">
						<?php foreach($price as $row) { ?>
						<option value="<?= $row['pricing_id'] ?>" <?php if($store['pricing_id'] == $row['pricing_id']) { ?> selected <?php } ?>><?= $row['pricing_title'] ?></option>
						<?php } ?>
					</select> 
				</div>
				<div class="form-group">
					<div class="">
                        <input type="checkbox" name="take_away" value="take_away" <?php if($store['take_away'] != 0){ ?> checked <?php } ?>> Take Away
					</div>
					<div class="">
						<input type="checkbox" name="dine_in" value="dine_in" <?php if($store['dine_in'] != 0){ ?> checked <?php } ?>> Dine In
					</div>
					<div class="">
						<input type="checkbox" name="halal" value="halal" <?php if($store['halal'] != 0){ ?> checked <?php } ?>> Halal
					</div>
					<div class="">
						<input type="checkbox" name="vegetarian" value="vegetarian" <?php if($store['vegetarian'] != 0){ ?> checked <?php } ?>> Vegetarian
					</div>
					<div class="">
						<input type="checkbox" name="favourite" value="favourite" <?php if($store['favourite'] != 0){ ?> checked <?php } ?>> Favourite
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
