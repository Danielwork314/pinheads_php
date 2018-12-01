<section class="content-header">
	<h1>
		Edit Store Category
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>store_category">
				<i class="fa fa-tags"></i> Store Category</a>
		</li>
		<li>
			<a href="<?= base_url() ?>store_category/edit/<?= $store_category['store_category_id'] ?>"> Edit Store Category</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Store Category</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url() ?>store_category/edit/<?= $store_category['store_category_id']?>">
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
				<?= $input_field['thumbnail'] ?>
				<?= $input_field['store_category'] ?>
				<!-- <?= $input_field['parent_id'] ?> -->
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
