<section class="content-header">
	<h1>
		Edit Social media link
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
			<a href="<?= base_url() ?>store/details/<?= $social_media_link['social_media_id'] ?>">
				<?= $social_media_link['social_media_link'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>social_media_link/edit/<?= $social_media_link['social_media_link_id'] ?>"> Edit social media link</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>social_media_link/edit/<?= $social_media_link['social_media_link_id'] ?>" enctype="multipart/form-data">
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
                
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
