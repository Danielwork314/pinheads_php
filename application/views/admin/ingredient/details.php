<section class="content-header">
	<h1>
		<?= $ingredient['ingredient'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>ingredient">
				<i class="fa fa-clipboard-list"></i> Ingredient</a>
		</li>
		<li>
			<a href="<?= base_url() ?>ingredient/details/<?= $ingredient['ingredient_id'] ?>">
				<?= $ingredient['ingredient'] ?>
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
					<?= $ingredient['ingredient'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('ingredient/edit') . '/' . $ingredient['ingredient_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Ingredient</th>
						<td>:
							<?= $ingredient["ingredient"] ?>
						</td>
					</tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $ingredient["created_date"] ?>
						</td>
					</tr>
					<tr>
						<th>Created By</th>
						<td>:
							<?= $ingredient["created_by"] ?>
						</td>
					</tr>
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $ingredient["modified_date"] ?>
						</td>
					</tr>
					<tr>
						<th>Modified By</th>
						<td>:
							<?= $ingredient["modified_by"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
