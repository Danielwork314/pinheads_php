<section class="content-header">
	<h1>
		<?= $menu['menu'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Menu">
				<i class="fa fa-utensils"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Menu/details/<?= $menu['menu_id'] ?>">
				<?= $menu['menu'] ?>
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
					<?= $menu['menu'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('menu/edit') . '/' . $menu['menu_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Menu Image</th>
						<td>:
							<?= $menu["image"] ?>
						</td>
					</tr>
					<tr>
						<th>Food Title</th>
						<td>:
							<?= $menu["menu"] ?>
						</td>
					</tr>
					<tr>
						<th>Food Description</th>
						<td>:
							<?= $menu["description"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food_Price</th>
						<td>:
							<?= $menu["price"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food Discount</th>
						<td>:
							<?= $menu["discount"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
    </div>
    <div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?= $menu['menu'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('menu/edit') . '/' . $menu['menu_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Menu Image</th>
						<td>:
							<?= $menu["image"] ?>
						</td>
					</tr>
					<tr>
						<th>Food Title</th>
						<td>:
							<?= $menu["menu"] ?>
						</td>
					</tr>
					<tr>
						<th>Food Description</th>
						<td>:
							<?= $menu["description"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food_Price</th>
						<td>:
							<?= $menu["price"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food Discount</th>
						<td>:
							<?= $menu["discount"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
