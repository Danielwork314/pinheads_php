<section class="content-header">
	<h1>
		Edit coupon
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Coupon">
				<i class="fa fa-gift"></i> Coupon</a>
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
                
				<div class="form-group">
					<label>Coupon Title</label>
					<input type="text" class="form-control" name="coupon_title" required value="<?= $coupon['coupon_title'] ?>">
				</div>
                <div class="form-group">
					<label>Coupon Description</label>
					<input type="text" class="form-control" name="coupon_description" required value="<?= $coupon['coupon_description'] ?>">
				</div>
				<div class="form-group">
					<label>Valid Date</label>
					<input type="date" class="form-control" name="valid_date" required value="<?= $coupon['valid_date'] ?>">
				</div>
				<div class="form-group">
					<label>Store</label>
                    <select class="form-control" required name="store_id" id="form_store_id">
                        <?php foreach ($store as $row) { ?>
                            <option value="<?= $row['store_id'] ?>" <?php if($row['store_id'] == $coupon['store_id']){ ?> selected <?php } ?>><?= $row['store_title'] ?></option>
                        <?php } ?>
                    </select>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
