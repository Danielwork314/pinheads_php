<section class="content-header">
	<h1>
		<?= $feature['feature'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>feature">
				<i class="fa fa-money-bill-alt"></i> Feature</a>
		</li>
		<li>
			<a href="<?= base_url() ?>feature/details/<?= $feature['feature_id'] ?>">
				<?= $feature['feature'] ?>
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
					<?= $feature['feature'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('feature/edit') . '/' . $feature['feature_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Feature Title</th>
						<td>:
							<?= $feature["feature"] ?>
						</td>
					</tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $feature["created_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Created By</th>
						<td>:
							<?= $feature["created_by"] ?>
						</td>
					</tr> -->
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $feature["modified_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Modified By</th>
						<td>:
							<?= $feature["modified_by"] ?>
						</td>
					</tr> -->
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
