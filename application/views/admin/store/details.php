<section class="content-header">
	<h1>
		<?= $store['store_title'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Store">
				<i class="fa fa-archive"></i> Store</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Store/details/<?= $store['store_id'] ?>">
				<?= $store['store_title'] ?>
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
					<?= $store['store_title'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('store/edit') . '/' . $store['store_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Title</th>
						<td>:
							<?= $store["store_title"] ?>
						</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>:
							<?= $store["store_address"] ?>
						</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>:
							<?= $store["store_phone"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Latitude</th>
						<td>:
							<?= $store["latitude"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Longitude</th>
						<td>:
							<?= $store["longitude"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Business hour</th>
						<td>:
							<?= $store["business_hour"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Take away</th>
						<td>:
                            <?php if($store['take_away'] != 0){ ?>
                                YES
                            <?php } else { ?>
                                NO
                            <?php } ?>
						</td>
                    </tr>
                    <tr>
						<th>Dine in</th>
						<td>:
                            <?php if($store['dine_in'] != 0){ ?>
                                YES
                            <?php } else { ?>
                                NO
                            <?php } ?>
						</td>
                    </tr>
                    <tr>
						<th>Halal</th>
						<td>:
                            <?php if($store['halal'] != 0){ ?>
                                YES
                            <?php } else { ?>
                                NO
                            <?php } ?>
						</td>
                    </tr>
                    <tr>
						<th>Vegetarian</th>
						<td>:
                            <?php if($store['vegetarian'] != 0){ ?>
                                YES
                            <?php } else { ?>
                                NO
                            <?php } ?>
						</td>
                    </tr>
                    <tr>
						<th>Favourite</th>
						<td>:
                            <?php if($store['favourite'] != 0){ ?>
                                YES
                            <?php } else { ?>
                                NO
                            <?php } ?>
						</td>
                    </tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
