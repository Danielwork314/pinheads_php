<section class="content-header">
	<h1>
		Add Feedback
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>feedback">
				<i class="fa fa-gift"></i> Feedback</a>
		</li>
		<li>
			<a href="<?= base_url() ?>feedback/add"> Add feedback</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Feedback</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>feedback/add" enctype="multipart/form-data">
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
					<label>Feedback</label>
					<input type="text" class="form-control" name="feedback" required placeholder="Feedback">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
