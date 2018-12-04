<section class="content-header">
	<h1>
		Add Social media link
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>social_media_link">
				<i class="fa fa-link"></i> Social media link</a>
		</li>
        <li>
			<a href="<?= base_url() ?>store/details/<?= $store['store_id'] ?>">
				<?= $store['store'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>social_media_link/add/<?= $store_id ?>"> Add Social media link</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Social media link</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>social_media_link/add/<?= $store_id ?>" enctype="multipart/form-data">
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
				
				<?= $input_field['social_media_id'] ?>
				<?= $input_field['social_media_link'] ?>
				
                <!-- <?= $input_field['url'] ?> -->
                <!-- <?= $input_field['store_id'] ?> -->
				

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
