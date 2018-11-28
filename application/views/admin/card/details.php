<section class="content-header">
	<h1>
		<?= $card['bank'] ?>
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
		<li>
			<a href="<?= base_url() ?>Card/details/<?= $card['card_id'] ?>">
				<?= $card['bank'] ?>
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
					<?= $card['bank'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('card/edit') . '/' . $card['card_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Card No</th>
						<td>:
							<?= $card["card"] ?>
						</td>
					</tr>
					<tr>
						<th>Bank</th>
						<td>:
							<?= $card["bank"] ?>
						</td>
					</tr>
					<tr>
						<th>Card Type</th>
						<td>:
							<?= $card["card_type"] ?>
						</td>
                    </tr>
                    <tr>
						<th>CVV</th>
						<td>:
							<?= $card["cvv"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Month</th>
						<td>:
							<?= $card["month"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Year</th>
						<td>:
							<?= $card["year"] ?>
						</td>
                    </tr>
                    <tr>
						<th>First Name</th>
						<td>:
							<?= $card["firstname"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Last Name</th>
						<td>:
							<?= $card["lastname"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Address</th>
						<td>:
							<?= $card["address"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Region</th>
						<td>:
							<?= $card["region"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Phone No</th>
						<td>:
							<?= $card["phone"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Email</th>
						<td>:
							<?= $card["email"] ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
    </div>
</section>
