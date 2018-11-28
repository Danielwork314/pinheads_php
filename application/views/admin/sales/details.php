<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		Sales Order
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>sales">
				<i class="fas fa-tasks"></i> Sales</a>
		</li>
		<li>
			<a href="<?= base_url() ?>sales/details/<?= $order['sales_id'] ?>">
				Sales Order
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
					Sales Info
				</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Status</th>
						<td>:
							<?=($order['status'] == 1) ? "Paid" : "Havn't Pay"?>
						</td>
                    </tr>
					<tr>
						<th>User</th>
						<td>: 
                            <?= $order['name'] ?>
                        </td>
					</tr>
					<tr>
						<th>Store</th>
						<td>: 
                            <?= $order['store'] ?>
                        </td>
					</tr>
					<tr>
						<th>Take Away</th>
						<td>: 
                            <?=($order['take_away'] == 1) ? "YES" : "NO"?>
                        </td>
					</tr>
					<tr>
						<th>Sub Total</th>
						<td>:
							<?= $order["sub_total"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Service Change</th>
						<td>:
							<?= $order["service_change"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Total</th>
						<td>:
							<?= $order["total"] ?>
						</td>
                    </tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $order["created_date"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
    </div>
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					User's Payment Info
				</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Card Number</th>
						<td>: 
                            <?= $order['card'] ?>
                        </td>
					</tr>
					<tr>
						<th>Bank</th>
						<td>: 
							<?= $order['bank'] ?>
                        </td>
					</tr>
					<tr>
						<th>Card type</th>
						<td>: 
							<?= $order['card_type'] ?>
                        </td>
					</tr>
					<tr>
						<th>Address 1</th>
						<td>: 
							<?= $order['address1'] ?>
                        </td>
					</tr>
					<tr>
						<th>Address 2</th>
						<td>: 
							<?= $order['address2'] ?>
                        </td>
					</tr>
					<tr>
						<th>State</th>
						<td>: 
							<?= $order['state'] ?>
                        </td>
					</tr>
					<tr>
						<th>Postcode</th>
						<td>: 
							<?= $order['postcode'] ?>
                        </td>
					</tr>
					<tr>
						<th>Country</th>
						<td>: 
							<?= $order['country'] ?>
                        </td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
    </div>

	<div class="col-md-12 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">
					Food's Order List
				</h3>
			</div>
			<br>
			<div class='box-body no-padding'>
				<div id="refreshBox">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Food</th>
								<th>Price</th>
							</tr>
						</thead>
						<?php $i = 1; foreach($food as $row){ ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $row['food'] ?></td>
								<td><?= $row['price'] ?></td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
</div>