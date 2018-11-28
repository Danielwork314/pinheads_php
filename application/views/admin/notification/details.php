<section class="content-header">
	<h1>
		<?= $notification['notification'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>notification">
				<i class="fa fa-bell"></i> Notification</a>
		</li>
		<li>
			<a href="<?= base_url() ?>notification/details/<?= $notification['notification_id'] ?>">
				<?= $notification['notification'] ?>
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
					<?= $notification['notification'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('notification/edit') . '/' . $notification['notification_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
                    <tr>
						<th>User</th>
						<td>:
							<?= $notification["user"] ?>
						</td>
					</tr>
					<tr>
						<th>Notification Title</th>
						<td>:
							<?= $notification["notification"] ?>
						</td>
					</tr>
                    <tr>
						<th>Notification Description</th>
						<td>:
							<?= $notification["description"] ?>
						</td>
					</tr>
                    <tr>
						<th>End Date</th>
						<td>:
							<?= $notification["end_date"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
