<section class="content-header">
	<h1>
		<?= $subject['subject'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Subject">
				<i class="fa fa-book"></i> Subject</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Subject/details/<?= $subject['subject_id'] ?>">
				<?= $subject['subject'] ?>
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
					<?= $subject['subject'] ?>
				</h3>
				<a href="<?php echo site_url('Subject/edit') . '/' . $subject['subject_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Subject</th>
						<td>:
							<?= $subject["subject"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
