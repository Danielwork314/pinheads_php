<section class="content-header">
	<h1>
		<?= $notification['notification_title'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>notification">
				<i class="fa fa-bell"></i> Notification</a>
		</li>
		<li>
			<a href="<?= base_url() ?>notification/details/<?= $notification['notification_id'] ?>">
				<?= $notification['notification_title'] ?>
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
					<?= $notification['notification_title'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('notification/edit') . '/' . $notification['notification_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
                    <tr>
						<th>User ID</th>
						<td>:
							<?= $notification["user_id"] ?>
						</td>
					</tr>
					<tr>
						<th>Notification Title</th>
						<td>:
							<?= $notification["notification_title"] ?>
						</td>
					</tr>
                    <tr>
						<th>Notification Description</th>
						<td>:
							<?= $notification["notification_description"] ?>
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
