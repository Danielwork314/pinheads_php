<section class="content-header">
	<h1>
		<?= $student['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Student">
				<i class="fa fa-genderless"></i> Student</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Student/details/<?= $student['student_id'] ?>">
				<?= $student['username'] ?>
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
					<?= $student['username'] ?>
				</h3>
				<a href="<?php echo site_url('Student/edit') . '/' . $student['student_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $student["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $student["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $student["role"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
