<section class="content-header">
	<h1>
		<?= $food['food_title'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-utensils"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food/details/<?= $food['food_id'] ?>">
				<?= $food['food_title'] ?>
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
					<?= $food['food_title'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('food/edit') . '/' . $food['food_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Food Image</th>
						<td>:
							<?= $food["food_image"] ?>
						</td>
					</tr>
					<tr>
						<th>Food Title</th>
						<td>:
							<?= $food["food_title"] ?>
						</td>
					</tr>
					<tr>
						<th>Food Description</th>
						<td>:
							<?= $food["food_description"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food_Price</th>
						<td>:
							<?= $food["food_price"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food Discount</th>
						<td>:
							<?= $food["food_discount"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Store</th>
						<td>:
							<?= $food["store_id"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
