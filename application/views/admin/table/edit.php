<section class="content-header">
	<h1>
		Edit Table No.
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>table">
            <i class="fas fa-clipboard-list"></i> Table</a>
		</li>
		<li>
			<a href="<?= base_url() ?>table/edit/<?= $table['table_position_id'] ?>"> Edit table</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Table</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>table/edit/<?= $table['table_position_id'] ?>" enctype="multipart/form-data">
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
					<label>Table No.</label>
					<input type="text" class="form-control" name="table_position" required value="<?= $table['table_position'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
