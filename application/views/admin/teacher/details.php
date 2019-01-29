<section class="content-header">
	<h1>
		<?= $teacher['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Teacher">
				<i class="fa fa-genderless"></i> Teacher</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Teacher/details/<?= $teacher['teacher_id'] ?>">
				<?= $teacher['username'] ?>
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
					<?= $teacher['username'] ?>
				</h3>
				<a href="<?php echo site_url('Teacher/edit') . '/' . $teacher['teacher_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $teacher["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $teacher["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $teacher["role"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
