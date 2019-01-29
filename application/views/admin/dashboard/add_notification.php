<section class="content-header">
	<h1>
		Add notification
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Dashboard">
				<i class="fa fa-tachometer-alt"></i> Dashboard</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Dashboard/add_notification"> Add notification</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>dashboard/add_notification">
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
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
