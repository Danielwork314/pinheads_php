<section class="content-header">
	<h1>
		<?= $billing_address['billing_address'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Billing Address">
				<i class="fa fa-gift"></i> Billing Address</a>
		</li>
		<li>
			<a href="<?= base_url() ?>billing_address/details/<?= $billing_address['billing_address_id'] ?>">
				<?= $billing_address['billing_address'] ?>
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
					<?= $billing_address['billing_address'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('billing_address/edit') . '/' . $billing_address['billing_address_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
                    <tr>
						<th>User ID</th>
						<td>:
							<?= $billing_address["user_id"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Address 1</th>
						<td>:
							<?= $billing_address["address1"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Address 2</th>
						<td>:
							<?= $billing_address["address 2"] ?>
						</td>
                    </tr>
                    <tr>
						<th>State</th>
						<td>:
							<?= $billing_address["state"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Postcode</th>
						<td>:
							<?= $billing_address["postcode"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Country</th>
						<td>:
							<?= $billing_address["country"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
