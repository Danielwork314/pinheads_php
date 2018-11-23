<section class="content-header">
	<h1>
		Edit Gourmet Type
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>gourmet_type">
				<i class="fa fa-mortar-pestle"></i> Gourmet Type</a>
		</li>
		<li>
			<a href="<?= base_url() ?>gourmet_type/edit/<?= $gourmet_type['gourmet_type_id'] ?>"> Edit gourmet type</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Gourmet Type</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>gourmet_type/edit/<?= $gourmet_type['gourmet_type_id'] ?>" enctype="multipart/form-data">
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
					<input type="text" class="form-control" name="gourmet_type" required value="<?= $gourmet_type['gourmet_type'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
