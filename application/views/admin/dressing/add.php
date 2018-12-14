<section class="content-header">
	<h1>
		Add Dressing
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>dressing">
				<i class="fa fa-share-square"></i> Dressing</a>
		</li>
		<li>
			<a href="<?= base_url() ?>dressing/add"> Add Dressing</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Dressing</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>dressing/add" enctype="multipart/form-data">
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

				<?= $input_field['dressing'] ?>
                
				

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
