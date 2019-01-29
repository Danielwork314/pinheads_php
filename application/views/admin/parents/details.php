<section class="content-header">
	<h1>
		<?= $parents['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Parents">
				<i class="fa fa-genderless"></i> Parent</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Parents/details/<?= $parents['parents_id'] ?>">
				<?= $parents['username'] ?>
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
					<?= $parents['username'] ?>
				</h3>
				<a href="<?php echo site_url('Parents/edit') . '/' . $parents['parents_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $parents["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $parents["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $parents["role"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
