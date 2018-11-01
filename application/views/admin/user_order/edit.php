<section class="content-header">
	<h1>
		Edit user order
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>user_order">
				<i class="fa fa-utensils"></i> User Order</a>
		</li>
		<li>
			<a href="<?= base_url() ?>user_order/edit/<?= $user_order['user_order_id'] ?>"> Edit payment</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">User Order</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>user_order/edit/<?= $user_order['user_order_id'] ?>" enctype="multipart/form-data">
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
					<label>Take Away</label>
					<input type="text" class="form-control" name="take_away" required value="<?= $user_order['take_away'] ?>">
				</div>
                <div class="form-group">
					<label>Sub Total</label>
					<input type="text" class="form-control" name="sub_total" required value="<?= $user_order['sub_total'] ?>">
				</div>
				<div class="form-group">
					<label>Service Change</label>
					<input type="text" class="form-control" name="service_change" required value="<?= $user_order['service_change'] ?>">
				</div>
				<div class="form-group">
					<label>Total</label>
					<input type="text" class="form-control" name="total" required value="<?= $user_order['total'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
