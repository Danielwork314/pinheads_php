<section class="content-header">
	<h1>
		<?= $classroom['classroom'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Classroom">
				<i class="fa fa-laptop"></i> Classroom</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Classroom/details/<?= $classroom['classroom_id'] ?>">
				<?= $classroom['classroom'] ?>
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
					<?= $classroom['classroom'] ?>
				</h3>
				<a href="<?php echo site_url('Classroom/edit') . '/' . $classroom['classroom_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Classroom</th>
						<td>:
							<?= $classroom["classroom"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
