<section class="content-header">
	<h1>
		<?= $payment['bank'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Payment">
				<i class="fa fa-utensils"></i> Payment</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Payment/details/<?= $payment['payment_id'] ?>">
				<?= $payment['bank'] ?>
			</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?= $payment['bank'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('payment/edit') . '/' . $payment['payment_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Card No</th>
						<td>:
							<?= $payment["card_no"] ?>
						</td>
					</tr>
					<tr>
						<th>Bank</th>
						<td>:
							<?= $payment["bank"] ?>
						</td>
					</tr>
					<tr>
						<th>Card Type</th>
						<td>:
							<?= $payment["card_type"] ?>
						</td>
                    </tr>
                    <tr>
						<th>CVV</th>
						<td>:
							<?= $payment["cvv"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Month</th>
						<td>:
							<?= $payment["month"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Year</th>
						<td>:
							<?= $payment["year"] ?>
						</td>
                    </tr>
                    <tr>
						<th>First Name</th>
						<td>:
							<?= $payment["firstname"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Last Name</th>
						<td>:
							<?= $payment["lastname"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Address</th>
						<td>:
							<?= $payment["address"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Region</th>
						<td>:
							<?= $payment["region"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Phone No</th>
						<td>:
							<?= $payment["phone"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Email</th>
						<td>:
							<?= $payment["email"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
    </div>
</section>
