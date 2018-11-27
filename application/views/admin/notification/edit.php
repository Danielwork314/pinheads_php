<section class="content-header">
	<h1>
		Edit Notification
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>notification">
				<i class="fa fa-bell"></i> Notification</a>
		</li>
		<li>
			<a href="<?= base_url() ?>notification/edit/<?= $notification['notification_id'] ?>"> Edit notification</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Notification</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>notification/edit/<?= $notification['notification_id'] ?>" enctype="multipart/form-data">
			<div class="box-body">
				<?php 
				if (isset($error)) { 
					?>
					<div class="alert alert-danger alert-dismissable">
						<?= $error; ?>						
					</div>
					<?php 
				}
				?>
				
                <?= $input_field['notification'] ?>
				<?= $input_field['description'] ?>
				<!-- <?= $input_field['end_date'] ?> -->

				<!-- <div class="form-group">
					<label>Notification Title</label>
					<input type="text" class="form-control" name="notification" required value="<?= $notification['notification'] ?>">
				</div>
                <div class="form-group">
					<label>Notification Description</label>
					<input type="text" class="form-control" name="description" required value="<?= $notification['description'] ?>">
				</div> -->
                <div class="form-group">
					<label>End Date</label>
					<input type="text" class="form-control" name="end_date" required value="<?= $notification['end_date'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
