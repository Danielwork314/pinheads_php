<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		<?= $food['food'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Store">
				<i class="fa fa-store"></i> Store</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Store/details/<?= $food['store_id'] ?>">
				<?= $food['store'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food/details/<?= $food['food_id'] ?>">
				<?= $food['food'] ?>
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
					<?= $food['food'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('food/edit_menu') . '/' . $food['food_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<!-- <th>Image</th> -->
						<td>
						<a href="<?= base_url() ?>food/details_menu/<?= $food['food_id']?>">
								<img src="<?= base_url() . $food['image'] ?>" class="xs_thumbnail">
                        	</a>
						</td>
					</tr>
					<tr>
						<th>Title</th>
						<td>:
							<?= $food["food"] ?>
						</td>
					</tr>
					<tr>
						<th>Description</th>
						<td>:
							<?= $food["description"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Price</th>
						<td>:
							<?= $food["price"] ?>
						</td>
					</tr>
					<tr>
						<th>Discounted Price</th>
						<td>:
							<?= $food["discounted_price"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Discount</th>
						<td>:
							<?= $food["discount"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
    </div>
</section>
</div>