<section class="content-header">
	<h1>
		Banner Details
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>banner">
				<i class="fa fa-image"></i> Banner</a>
		</li>
		<li>
			<a href="<?= base_url() ?>banner/details/<?= $banner['banner_id'] ?>">
				Banner Details
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
					Banner Details
				</h3>
				<a href="<?php echo site_url('banner/edit') . '/' . $banner['banner_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<img src="<?= base_url() . $banner['image'] ?>" class="xs_thumbnail">
				<table class="formTable">
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $banner["created_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Created By</th>
						<td>:
							<?= $banner["created_by"] ?>
						</td>
					</tr> -->
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $banner["modified_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Modified By</th>
						<td>:
							<?= $banner["modified_by"] ?>
						</td>
					</tr> -->
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
