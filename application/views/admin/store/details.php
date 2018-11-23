<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		<?= $store['store'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Store">
				<i class="fa fa-archive"></i> Store</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Store/details/<?= $store['store_id'] ?>">
				<?= $store['store'] ?>
			</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-8 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?= $store['store'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('store/edit') . '/' . $store['store_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<!-- <th>Store Image</th> -->
						<td>
							<a href="<?= base_url() ?>food/details/<?= $store['store_id']?>">
								<img src="<?= base_url() . $store['thumbnail'] ?>" class="xs_thumbnail">
                        	</a>
						</td>
					</tr>
					<tr>
						<th>Store</th>
						<td>:
							<?= $store["store"] ?>
						</td>
					</tr>
					<tr>
						<th>Type</th>
						<td>:
							<?= $store["gourmet_type_title"] ?>
						</td>
					</tr>
					<tr>
						<th>Pricing</th>
						<td>:
							<?= $store["pricing_title"] ?>
						</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>:
							<?= $store["address"] ?>
						</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>:
							<?= $store["phone"] ?>
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
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
					<h3 class="box-title">
						<?=$store['store']?>'s Food Lists
					</h3>
					<a href="<?php echo site_url('food/add_menu') . '/' . $store['store_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> Add</a>
			</div>
				
				<br>
				<div class='box-body no-padding'>
					<div id="refreshBox">
						<table id="data-table" class="table table-bordered table-hover data-table">
							<thead>
							<tr>
									<th>No.</th>
									<th>Image</th>
									<th>Title</th>
									<th>Description</th>
									<th>Price</th>
									<th>Discount Price</th>
									<th>Discount (%)</th>
									<th>Created Date</th>
									<!-- <th>Created By</th> -->
									<!-- <th></th> -->
							</tr>
							</thead>
							<?php
								$i = 1;
								foreach($food as $row){
							?>
								<tr>
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $i ?>
										</a>
									</td>
									
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<img src="<?= base_url() . $row['image'] ?>" class="xs_thumbnail">
                                		</a>
									</td>
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $row['food'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $row['description'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $row['price'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $row['discounted_price'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $row['discount'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $row['created_date'] ?>
										</a>
									</td>
									<!-- <td>
										<a href="<?= base_url() ?>food/details_menu/<?= $row['food_id']?>">
											<?= $row['created_by'] ?>
										</a>
									</td> -->
									<!-- <td>
                                		<a href="<?= base_url() ?>food/delete_menu/<?= $row['food_id']?>" class="btn btn-danger delete-button">Delete</a>
                            		</td> -->
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


