<section class="content-header">
	<h1>
		<?= $product_category['product_category'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>product_category">
				<i class="fa fa-list-ul"></i> Product Category</a>
		</li>
		<li>
			<a href="<?= base_url() ?>product_category/details/<?= $product_category['product_category_id'] ?>">
				<?= $product_category['product_category'] ?>
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
					<?= $product_category['product_category'] ?>
				</h3>
				<a href="<?php echo site_url('product_category/edit') . '/' . $product_category['product_category_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Product Category</th>
						<td>:
							<?= $product_category["product_category"] ?>
						</td>
					</tr>
					<tr>
						<th>Parent</th>
						<td>:
							<?= $product_category["parent"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
