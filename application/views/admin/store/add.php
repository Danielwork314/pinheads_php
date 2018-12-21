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
			<div class="container-fluid">
				<br /><br />
				<ul class="list-unstyled multi-steps">
					<li class="step_url is-active" id="step_link_1" onclick="changeStep(1)">Add Details</li>
					<li class="step_url" id="step_link_2" onclick="changeStep(2)">Add Image</li>
					<li class="step_url" id="step_link_2" onclick="changeStep(3)">Add Features</li>
				</ul>
			</div>
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
				<div class="step_content" id="step_1">
					<?= $input_field['thumbnail'] ?>
					<div class="form-group">
						<label>Store Banner</label>
						<input type="file" class="form-control" name="banner" id="file" required>
					</div>
					<?php
					if($this->session->userdata("login_data")['type'] == "ADMIN"){
					echo $input_field['vendor_id'];
					} else if($this->session->userdata("login_data")['type'] == "VENDOR") {
					?>
					<input type="hidden" name="vendor_id" value="<?= $this->session->userdata('login_id') ?>">
					<?php
					}
					?>
					<?= $input_field['store'] ?>
					<?= $input_field['description'] ?>
					<?= $input_field['address'] ?>
					<?= $input_field['phone'] ?>
					<?= $input_field['latitude'] ?>
					<?= $input_field['longitude'] ?>
					<?= $input_field['business_hour'] ?>
					<?= $input_field['gourmet_type_id'] ?>
					<?= $input_field['pricing_id'] ?>
					<div class="form-group">
						<div class="">
							<input type="checkbox" name="favourite" value="favourite"> Favourite
						</div>
					</div>
					<button type="button" class="btn btn-primary pull-right" onclick="changeStep(2)">Next</button>
				</div>
				<div class="step_content hidden_step" id="step_2">
					<div class="form_group">
						<label for="form_store_images">Store Images</label>
						<input type="file" class="form-control image_input_multiple" id="form_store_images" name="store_images[]"
						 multiple placeholder="Store Images">
						<div class="help-block with-errors"></div>
						<div class="row" id="preview_store_images">

						</div>
					</div>
					<button type="button" class="btn btn-primary" onclick="changeStep(1)">Previous</button>
					<button type="button" class="btn btn-primary pull-right" onclick="changeStep(3)">Next</button>
				</div>
				<div class="step_content hidden_step" id="step_3">
					<?php
					foreach($feature as $row){
					?>
					<label>
						<?= $row['feature'] ?></label>
					<label class="switch pull-right">
						<input type="checkbox" name="feature_id[]" value="<?= $row['feature_id'] ?>">
						<span class="slider"></span>
					</label>
					<hr>
					<?php
					}
					?>
					<button type="button" class="btn btn-primary" onclick="changeStep(2)">Previous</button>
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
			</div>
		</form>
	</div>
</section>
