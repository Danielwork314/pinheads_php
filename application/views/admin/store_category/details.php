<section class="content-header">
	<h1>
		<?= $store_category['store_category'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>store_category">
				<i class="fa fa-tags"></i> Store Category</a>
		</li>
		<li>
			<a href="<?= base_url() ?>store_category/details/<?= $store_category['store_category_id'] ?>">
				<?= $store_category['store_category'] ?>
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
					<?= $store_category['store_category'] ?>
				</h3>
				<a href="<?php echo site_url('store_category/edit') . '/' . $store_category['store_category_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<img src="<?= base_url() . $store_category['thumbnail']?>" class="xs_thumbnail">
				<table class="formTable">
					<tr>
						<th>Store Category</th>
						<td>:
							<?= $store_category["store_category"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Parent</th>
						<td>:
							<?= $store_category["parent"] ?>
						</td>
					</tr> -->
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
