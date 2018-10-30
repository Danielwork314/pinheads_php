<section class="content-header">
	<h1>
		Add Ingredient
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>ingredient">
				<i class="fa fa-clipboard-list"></i> Pricing</a>
		</li>
		<li>
			<a href="<?= base_url() ?>ingredient/add"> Add Ingredient</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Ingredient</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>ingredient/add" enctype="multipart/form-data">
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
					<label>Ingredient</label>
					<input type="text" class="form-control" name="ingredient" required placeholder="Ingredient">
				</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
