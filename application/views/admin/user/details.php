<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		<?= $user['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>User">
				<i class="fa fa-users"></i> User</a>
		</li>
		<li>
			<a href="<?= base_url() ?>User/details/<?= $user['user_id'] ?>">
				<?= $user['username'] ?>
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
					<?= $user['username'] ?>
				</h3>
				<a href="<?php echo site_url('user/edit') . '/' . $user['user_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<img src="<?= base_url() . $user['image'] ?>" class="xs_thumbnail">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $user["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $user["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Gender</th>
						<td>:
							<?= $user["gender"] ?>
						</td>
					</tr>
					<tr>
						<th>Date of Birth</th>
						<td>:
							<?= $user["dob"] ?>
						</td>
					</tr>
					<tr>
						<th>Contact Number</th>
						<td>:
							<?= $user["contact"] ?>
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:
							<?= $user["email"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $user["role"] ?>
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
						<?=$user['username']?>'s Card Lists
					</h3>
					<a href="<?php echo site_url('card/add') . '/' . $user['user_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> Add</a>
			</div>
				
			<br>

			<div class='box-body no-padding'>
				<div id="refreshBox">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
						<tr>
							<th>No.</th>
							<th>Bank </th>
							<th>Card Type</th>
							<th>Created Date</th>
							<th></th>
						</tr>
						</thead>
						<?php
							$i = 1;
							foreach($card as $row){
								?>
								<tr>
									<td>
										<a href="<?= base_url() ?>card/details/<?= $row['card_id']?>">
											<?= $i ?>
                                		</a>
									</td>
									
									<td>
										<a href="<?= base_url() ?>card/details/<?= $row['card_id']?>">
											<?= $row['bank'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>card/details/<?= $row['card_id']?>">
											<?= $row['card_type'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>card/details/<?= $row['card_id']?>">
											<?= $row['created_date'] ?>
										</a>
									</td>
									<td>
                                		<a href="<?= base_url() ?>card/delete/<?= $row['card_id']?>" class="btn btn-danger delete-button">Delete</a>
                            		</td>
								</tr>
								<?php
								$i++;
							}
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
					<h3 class="box-title">
						<?=$user['username']?>'s Billing Address Lists
					</h3>
					<a href="<?php echo site_url('billing_address/add/') . $user['user_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> Add</a>
			</div>
				
			<br>

			<div class='box-body no-padding'>
				<div id="refreshBox">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
						<tr>
							<th>No.</th>
							<th>Address 1 </th>
							<th>Address 2</th>
							<th>State</th>
							<th>Postcode</th>
							<th>Country</th>
							<th>Created Date</th>
							<th></th>
						</tr>
						</thead>
						<?php
							$i = 1;
							foreach($billing_address as $row){
								?>
								<tr>
									<td>
										<a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
											<?= $i ?>
                                		</a>
									</td>
									
									<td>
										<a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
											<?= $row['address1'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
											<?= $row['address2'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
											<?= $row['state'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
											<?= $row['postcode'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
											<?= $row['country'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
											<?= $row['created_date'] ?>
										</a>
									</td>
									<td>
                                		<button type="button" class="btn btn-danger remove_billing_address" data-id="<?= $row['billing_address_id']?>">Delete</button>
                            		</td>
								</tr>
								<?php
								$i++;
							}
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
					<h3 class="box-title">
						<?=$user['username']?>'s Order Food Lists
					</h3>
					<a href="<?php echo site_url('sales/add') . '/' . $user['user_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> Add</a>
			</div>
				
			<br>

			<div class='box-body no-padding'>
				<div id="refreshBox">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
						<tr>
							<th>No.</th>
							<th>User Order ID </th>
							<th>Take Away</th>
							<th>Sub Total</th>
							<th>Service Change</th>
							<th>Total</th>
							<th>Status</th>
							<th>Created Date</th>
							<th></th>
						</tr>
						</thead>
						<?php
							$i = 1;
							foreach($sales as $row){
								?>
								<tr>
									<td>
										<a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?= $i ?>
                                		</a>
									</td>
									
									<td>
										<a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?= $row['sales_id'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?=($row['take_away'] == 1) ? "YES" : "NO"?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?= $row['sub_total'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?= $row['service_change'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?= $row['total'] ?>
										</a>
									</td>
									<td>
										<!-- <a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?=($row['status'] == 1) ? "Delivered" : "Processing..."?>
										</a> -->
										<?php if($row['status'] == 0){ ?>
											<a class="btn btn-warning" data-id="<?=$row["sales_id"]?>" href="<?= base_url()?>sales/deliver/<?= $row['sales_id']?>"><i class="fa fa-times"></i> Processing...</a>  
										<?php } else { ?>
											<a class="btn btn-success" data-id="<?=$row["sales_id"]?>" href="<?= base_url()?>sales/processing/<?= $row['sales_id']?>"><i class="fa fa-check"> Delivered</i> </a>
												
										<?php } ?>
									</td>
									<td>
										<a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>">
											<?= $row['created_date'] ?>
										</a>
									</td>
									<td>
                                		<a href="<?= base_url() ?>sales/delete/<?= $row['sales_id']?>" class="btn btn-danger delete-button">Delete</a>
                            		</td>
								</tr>
								<?php
								$i++;
							}
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
</div>

<script>

	$('.remove_billing_address').click(function(){

		var billing_address_id = $(this).attr('data-id');
		var user_id = <?= $user['user_id'] ?>;

		postParam = {
			billing_address_id: billing_address_id,
		};

		$.ajax({
            url:'<?=base_url()?>Billing_address/delete',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                console.log(data);
				// window.location = "<?= base_url() ?>user/details/" + user_id;
				location.reload();
            }, 
            error: function () {
                console.log("error");
            }
        });
	});
</script>