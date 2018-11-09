<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		<?= $vendor['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>vendor">
				<i class="fa fa-user"></i> Vendor</a>
		</li>
		<li>
			<a href="<?= base_url() ?>vendor/details/<?= $vendor['vendor_id'] ?>">
				<?= $vendor['username'] ?>
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
					<?= $vendor['username'] ?>
				</h3>
				<a href="<?php echo site_url('vendor/edit') . '/' . $vendor['vendor_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Profile Picture</th>
						<td>:
							<a href="<?= base_url() ?>vendor/details/<?= $vendor['vendor_id']?>">
								<img src="<?= base_url() . $vendor['image'] ?>" class="xs_thumbnail">
                        	</a>
						</td>
					</tr>
					<tr>
						<th>Username</th>
						<td>:
							<?= $vendor["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $vendor["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Contact Number</th>
						<td>:
							<?= $vendor["contact"] ?>
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:
							<?= $vendor["email"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $vendor["role"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
</div>



