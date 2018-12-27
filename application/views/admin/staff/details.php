<section class="content-header">
	<h1>
		<?= $staff['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Staff">
				<i class="fa fa-store-alt"></i> Staff</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Staff/details/<?= $staff['staff_id'] ?>">
				<?= $staff['username'] ?>
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
					<?= $staff['username'] ?>
				</h3>
				<a href="<?php echo site_url('staff/edit') . '/' . $staff['staff_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $staff["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $staff["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $staff["role"] ?>
						</td>
					</tr>
					<tr>
						<th>Store</th>
						<td>:
							<?= $staff["store"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
