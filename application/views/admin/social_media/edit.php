<section class="content-header">
	<h1>
		Edit Social media
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>social_media">
				<i class="fa fa-share-square"></i> Social media</a>
		</li>
		<li>
			<a href="<?= base_url() ?>social_media/edit/<?= $social_media['social_media_id'] ?>"> Edit social_media</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Social media</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>social_media/edit/<?= $social_media['social_media_id'] ?>" enctype="multipart/form-data">
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
                <?= $input_field['social_media'] ?>
              
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
