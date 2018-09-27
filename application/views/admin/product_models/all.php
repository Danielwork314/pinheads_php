<section class="content-header">
	<h1>
		Products
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>product"><i class="fa fa-archive"></i> Product</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Product</h4>

			<a href='<?php echo site_url("product/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Thumbnail</th>
							<th>Name</th>
							<th>Product Category</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($product as $row){
                                ?>
						<tr>
							<td><a href="<?= base_url() ?>product/details/<?= $row['product_id']?>">
									<?= $i ?></a></td>
							<td><a href="<?= base_url() ?>product/details/<?= $row['product_id']?>">
									<img src="<?= base_url() . $row['thumb'] ?>" class="xs_thumbnail"></a></td>
							<td><a href="<?= base_url() ?>product/details/<?= $row['product_id']?>">
									<?= $row['product'] ?></a></td>
							<td><a href="<?= base_url() ?>product/details/<?= $row['product_id']?>">
									<?= $row['product_category'] ?></a></td>
							<td><a href="<?= base_url() ?>product/delete/<?= $row['product_id']?>" class="btn btn-danger delete-button">Delete</a></td>
						</tr>
						<?php
                                $i++;
                            }
                        ?>
					</tbody>
					<tfoot>
						<tr>
							<th>No.</th>
							<th>Thumbnail</th>
							<th>Name</th>
							<th>Product Category</th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</section>
