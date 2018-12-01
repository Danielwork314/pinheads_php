<section class="content-header">
	<h1>
		Edit coupon
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Coupon">
				<i class="fas fa-money-bill-wave"></i> Coupon</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Coupon/edit/<?= $coupon['coupon_id'] ?>"> Edit coupon</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Coupon</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>coupon/edit/<?= $coupon['coupon_id'] ?>" enctype="multipart/form-data">
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
                
				<?= $input_field['coupon'] ?>
				<?= $input_field['description'] ?>
				<?= $input_field['coupon_type_id'] ?>
				<?= $input_field['valid_date'] ?>
				<?= $input_field['store_id'] ?>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
