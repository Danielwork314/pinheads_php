<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		Edit payment
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Payment">
				<i class="fa fa-utensils"></i> Payment</a>
		</li>
		<li>
			<a href="<?= base_url() ?>payment/edit/<?= $payment['payment_id'] ?>"> Edit payment</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Payment</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>payment/edit/<?= $payment['payment_id'] ?>" enctype="multipart/form-data">
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
					<label>Card No</label>
					<input type="text" class="form-control" name="card_no" required value="<?= $payment['card_no'] ?>">
				</div>
                <div class="form-group">
					<label>Bank</label>
					<input type="text" class="form-control" name="bank" required value="<?= $payment['bank'] ?>">
				</div>
				<div class="form-group">
					<label>Card Type</label>
					<input type="text" class="form-control" name="card_type" required value="<?= $payment['card_type'] ?>">
				</div>
				<div class="form-group">
					<label>CVV</label>
					<input type="text" class="form-control" name="cvv" required value="<?= $payment['cvv'] ?>">
				</div>
                <div class="form-group">
					<label>Month</label>
					<input type="text" class="form-control" name="month" required value="<?= $payment['month'] ?>">
				</div>
                <div class="form-group">
					<label>Year</label>
					<input type="text" class="form-control" name="year" required value="<?= $payment['year'] ?>">
				</div>
                <div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="firstname" required value="<?= $payment['firstname'] ?>">
				</div>
                <div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="lastname" required value="<?= $payment['lastname'] ?>">
				</div>
                <div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" name="address" required value="<?= $payment['address'] ?>">
				</div>
                <div class="form-group">
					<label>Region</label>
					<input type="text" class="form-control" name="region" required value="<?= $payment['region'] ?>">
				</div>
                <div class="form-group">
					<label>Phone No</label>
					<input type="text" class="form-control" name="phnoe" required value="<?= $payment['phone'] ?>">
				</div>
                <div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" required value="<?= $payment['email'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
</div>