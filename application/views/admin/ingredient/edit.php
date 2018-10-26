<section class="content-header">
	<h1>
		Edit Ingredient
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>ingredient">
				<i class="fa fa-user-secret"></i> Ingredient</a>
		</li>
		<li>
			<a href="<?= base_url() ?>ingredient/edit/<?= $ingredient['ingredient_id'] ?>"> Edit ingredient</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>ingredient/edit/<?= $ingredient['ingredient_id'] ?>" enctype="multipart/form-data">
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
					<label>Ingredient Title</label>
					<input type="text" class="form-control" name="ingredient_title" required value="<?= $ingredient['ingredient_title'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
