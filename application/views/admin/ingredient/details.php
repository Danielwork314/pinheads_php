<section class="content-header">
	<h1>
		<?= $ingredient['ingredient_title'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>ingredient">
				<i class="fa fa-clipboard-list"></i> Ingredient</a>
		</li>
		<li>
			<a href="<?= base_url() ?>ingredient/details/<?= $ingredient['ingredient_id'] ?>">
				<?= $ingredient['ingredient_title'] ?>
			</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?= $ingredient['ingredient_title'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('ingredient/edit') . '/' . $ingredient['ingredient_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Ingredient Title</th>
						<td>:
							<?= $ingredient["ingredient_title"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
