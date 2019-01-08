<section class="content-header">
	<h1>
		Add Notification
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>notification">
				<i class="fa fa-bell"></i> Notification</a>
		</li>
		<li>
			<a href="<?= base_url() ?>notification/add"> Add notification</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>notification/add" enctype="multipart/form-data">
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

				<div class="form-group">
					<label for="form_user_id">User</label>
					<select class="form-control select2" id="form_user_id" name="user_id">
						<option value="0">All Users</option>
						<?php foreach($user as $row){ ?>
						<option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
						<?php } ?>
					</select>
					<div class="help-block with-errors"></div>
				</div>
				<?= $input_field['notification'] ?>
				<?= $input_field['description'] ?>
				<!-- <?= $input_field['end_date'] ?> -->
				<!-- <div class="form-group">
					<label>Notification</label>
					<input type="text" class="form-control" name="notificaiton" required placeholder="Notification">
				</div>
                <div class="form-group">
					<label>Notification Description</label>
					<input type="text" class="form-control" name="description" required placeholder="Notification description">
				</div> -->
				<div class="form-group">
					<label>End Date</label>
					<input type="text" class="form-control datepicker" name="end_date" required placeholder="End Date">
				</div>
				<div class="form-group">
					<label>End Time</label>
					<input type="text" class="form-control timepicker" name="end_time" required placeholder="End Time">
				</div>
				 
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>