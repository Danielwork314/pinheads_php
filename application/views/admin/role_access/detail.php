<section class="content-header">
	<h1>
		<?= $admin['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Admin">
				<i class="fa fa-users"></i> Admin</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Admin/details/<?= $admin['admin_id'] ?>">
				<?= $admin['username'] ?>
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
					<?= $admin['username'] ?>
				</h3>
				<a href="<?php echo site_url('admin/edit') . '/' . $admin['admin_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $admin["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $admin["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $admin["role"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
