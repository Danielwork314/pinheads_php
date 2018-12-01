<section class="content-header">
	<h1>
		<?= $feedback['feedback'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Feedback">
				<i class="fas fa-comments"></i> Feedback</a>
		</li>
		<li>
			<a href="<?= base_url() ?>feedback/details/<?= $feedback['feedback_id'] ?>">
				<?= $feedback['feedback'] ?>
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
					<?= $feedback['feedback'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('feedback/edit') . '/' . $feedback['feedback_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>User</th>
						<td>:
							<?= $feedback["user"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Feedback</th>
						<td>:
							<?= $feedback["feedback"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
