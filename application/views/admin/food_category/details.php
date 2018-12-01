<section class="content-header">
	<h1>
		<?= $food_category['food_category'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>food_category">
				<i class="fa fa-tags"></i> Food Category</a>
		</li>
		<li>
			<a href="<?= base_url() ?>food_category/details/<?= $food_category['food_category_id'] ?>">
				<?= $food_category['food_category'] ?>
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
					<?= $food_category['food_category'] ?>
				</h3>
				<a href="<?php echo site_url('food_category/edit') . '/' . $food_category['food_category_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<img src="<?= base_url() . $food_category['thumbnail']?>" class="xs_thumbnail">
				<table class="formTable">
					<tr>
						<th>Food Category</th>
						<td>:
							<?= $food_category["food_category"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Parent</th>
						<td>:
							<?= $food_category["parent"] ?>
						</td>
					</tr> -->
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
