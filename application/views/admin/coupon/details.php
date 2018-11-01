<section class="content-header">
	<h1>
		<?= $coupon['coupon'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Coupon">
				<i class="fas fa-money-bill-wave"></i> Coupon</a>
		</li>
		<li>
			<a href="<?= base_url() ?>coupon/details/<?= $coupon['coupon_id'] ?>">
				<?= $coupon['coupon'] ?>
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
					<?= $coupon['coupon'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('coupon/edit') . '/' . $coupon['coupon_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
                    <tr>
						<th>User ID</th>
						<td>:
							<?= $coupon["user_id"] ?>
						</td>
					</tr>
					<tr>
						<th>Coupon</th>
						<td>:
							<?= $coupon["coupon"] ?>
						</td>
					</tr>
					<tr>
						<th>Coupon Description</th>
						<td>:
							<?= $coupon["description"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Valid Date</th>
                        <td>: 
                            <?=($coupon['valid_date'] == 1) ? "YES" : "NO"?>
                        </td>
                    </tr>
                    <tr>
						<th>Used</th>
                        <td>: 
                            <?=($coupon['used'] == 1) ? "YES" : "NO"?>
                        </td>
                    </tr>
                    <tr>
						<th>Store</th>
						<td>:
							<?= $coupon["store_id"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
