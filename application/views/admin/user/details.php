<section class="content-header">
	<h1>
		<?= $user['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>User">
				<i class="fa fa-user"></i> User</a>
		</li>
		<li>
			<a href="<?= base_url() ?>User/details/<?= $user['user_id'] ?>">
				<?= $user['username'] ?>
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
					<?= $user['username'] ?>
				</h3>
				<a href="<?php echo site_url('user/edit') . '/' . $user['user_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $user["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $user["name"] ?>
						</td>
					</tr>
						<th>Email</th>
						<td>:
							<?= $user["email"] ?>
						</td>
					</tr>
						<th>Contact Number</th>
						<td>:
							<?= $user["contact"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $user["role"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
