<section class="content-header">
	<h1>
		<?=$product['product']?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?=base_url()?>product">
				<i class="fa fa-archive"></i> Product</a>
		</li>
		<li>
			<a href="<?=base_url()?>product/details/<?=$product['product_id']?>">
				<?=$product['product']?>
			</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?=$product['product']?>
					</h3>
					<a href="<?php echo site_url('product/edit') . '/' . $product['product_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-edit'></i> Edit</a>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<img class="xs_thumbnail" src="<?=base_urL() . $product['thumb']?>">
					<table class="formTable">
						<tr>
							<th>Product</th>
							<td>:
								<?=$product["product"]?>
							</td>
						</tr>
						<tr>
							<th>Product Category</th>
							<td>:
								<?=$product["product_category"]?>
							</td>
						</tr>
						<tr>
							<th>Price</th>
							<td>:
								<?=$product["price"]?>
							</td>
						</tr>
						<tr>
							<th>Description</th>
							<td>
							</td>
						</tr>
					</table>
					<p class="pre_wrap">
						<?=$product['description']?>
					</p>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?=$product['product']?>'s Models
					</h3>
					<a href="<?php echo site_url('product_models/add') . '/' . $product['product_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> Add</a>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<table class="table">
						<tr>
							<th>No.</th>
							<th>Model</th>
							<th>SKU</th>
							<th>Quantity</th>
						</tr>
						<?php
					$i = 1;
					foreach($product_model as $row){
						?>
						<tr>
							<td>
								<?= $i ?>
							</td>
							<td>
								<?= $row['product_model'] ?>
							</td>
							<td>
								<?= $row['SKU'] ?>
							</td>
							<td>
								<?= $row['quantity'] ?>
							</td>
						</tr>
						<?php
						$i++;
					}
					?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?=$product['product']?>
					</h3>
					<a href="<?php echo site_url('product_images/add') . '/' . $product['product_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> Add</a>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<div class="row">
						<?php
				foreach($product_image as $row){
					?>
						<div class="col-sm-4 col-xs-12 multi_preview_wrapper">
							<div class='col-sm-4 col-xs-12 multi_preview_image'>
								<img src='<?= base_url() . $row["thumb"] ?>'>
							</div>
						</div>
						<?php
				}
				?>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
