<section class="content-header">
	<h1>
		Edit feedback
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Feedback">
				<i class="fas fa-comments"></i> Feedback</a>
		</li>
		<li>
			<a href="<?= base_url() ?>feedback/edit/<?= $feedback['feedback_id'] ?>"> Edit feedback</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>feedback/edit/<?= $feedback['feedback_id'] ?>" enctype="multipart/form-data">
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
                <?= $input_field['feedback'] ?>
				<!-- <div class="form-group">
					<label>Feedback</label>
					<input type="text" class="form-control" name="feedback" required value="<?= $feedback['feedback'] ?>">
				</div> -->
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
