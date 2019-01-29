<section class="content-header">
	<h1>
		<?= $grade['grade'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Grade">
				<i class="fa fa-graduation-cap"></i> Grade</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Grade/details/<?= $grade['grade_id'] ?>">
				<?= $grade['grade'] ?>
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
					<?= $grade['grade'] ?>
				</h3>
				<a href="<?php echo site_url('Grade/edit') . '/' . $grade['grade_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Grade</th>
						<td>:
							<?= $grade["grade"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
