<section class="content-header">
	<h1>
		Add Gourmet Type
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Gourmet">
				<i class="fa fa-user-secret"></i> Gourmet Type</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Gourmet/add"> Add Gourmet Type</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Gourmet</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>gourmet_type/add" enctype="multipart/form-data">
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
					<label>Gourmet Type Title</label>
					<input type="text" class="form-control" name="gourmet_type_title" required placeholder="Gourmet type title">
				</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
