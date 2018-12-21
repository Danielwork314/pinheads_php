<div class="content-container" style="display: flow-root;">
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
                    <!-- <tr>
						<th>User ID</th>
						<td>:
							<?= $coupon["user_id"] ?>
						</td>
					</tr> -->
					<tr>
						<th>Coupon</th>
						<td>:
							<?= $coupon["coupon"] ?>
						</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<th>Discount Rate</th>
						<td>: <?= $coupon["discount_rate"] ?>%</td>
                    </tr>
					<tr>
						<td></td>
					</tr>
                    <tr>
						<th>Valid Date</th>
                        <td>: 
                            <?= $coupon['valid_date'] ?>
                        </td>
                    </tr>
                    <tr>
						<th>Partner Coupon</th>
                        <td>: 
                            <?=($coupon['partner_coupon'] == 1) ? "YES" : "NO"?>
                        </td>
                    </tr>
					<tr>
						<th>Number Assigned</th>
                        <td>: 
                            <?= $number ?>
                        </td>
                    </tr>
                    <tr>
						<th>Store</th>
						<td>:
							<?= $coupon["store"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>

	<div class="col-md-6">
		<div class="box box-primary">
			<div class='box-header'>
				<h4 class="whiteTitle" style='display: inline-block;'>Assigned User</h4>

				<a href='<?php echo site_url("coupon/add_user_coupon"). '/' . $coupon['coupon_id'] ?>' class='btn btn-info pull-right'>
					<i class='fa fa-plus'></i> Add</a>

			</div>
			<div class='box-body no-padding'>

				<div id="refreshBox">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
							<tr>
								<th>No.</th>
								<th>User</th>
								<th>Assigned Date</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 1;
								foreach($user_coupon as $row){
									?>
							<tr>
								<td>
									<?= $i ?>
								</td>
								<td>
									<?= $row['username'] ?>
								</td>
								<td>
									<?= $row['created_date'] ?>
								</td>
								<td>
									<a href="<?= base_url() ?>coupon/delete_user_coupon/<?= $row['user_coupon_id']?>" class="btn btn-danger delete-button">Delete</a>
								</td>
							</tr>
							<?php
									$i++;
								}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>No.</th>
								<th>User</th>
								<th>Assigned Date</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>			
	</div>

</section>
</div>