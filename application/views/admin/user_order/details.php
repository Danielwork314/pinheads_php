<section class="content-header">
	<h1>
		<?= $user_order['user_order_id'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>user_order">
				<i class="fa fa-utensils"></i> User Order</a>
		</li>
		<li>
			<a href="<?= base_url() ?>user_order/details/<?= $user_order['user_order_id'] ?>">
				<?= $user_order['user_order_id'] ?>
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
					<?= $user_order['user_order_id'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('user_order/edit') . '/' . $user_order['user_order_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>User Order ID</th>
						<td>:
							<?= $user_order["user_order_id"] ?>
						</td>
					</tr>
					<tr>
						<th>Take Away</th>
						<td>: 
                            <?=($user_order['take_away'] == 1) ? "YES" : "NO"?>
                        </td>
					</tr>
					<tr>
						<th>Sub Total</th>
						<td>:
							<?= $user_order["sub_total"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Service Change</th>
						<td>:
							<?= $user_order["service_change"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Total</th>
						<td>:
							<?= $user_order["total"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
    </div>
</section>
