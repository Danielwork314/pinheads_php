<section class="content-header">
	<h1>
		Edit grade
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Grade">
				<i class="fa fa-graduation-cap"></i> Grade</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Grade/edit/<?= $grade['grade_id'] ?>"> Edit grade</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Grade</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url() ?>grade/edit/<?= $grade['grade_id']?>">
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
				<?= $input_field['grade'] ?>			
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
