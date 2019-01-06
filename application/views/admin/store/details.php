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
		<div class="col-md-6 col-xs-12">
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
									<img src="<?= base_url() . $store['thumbnail'] ?>" class="xs_thumbnail">
							</td>
						</tr>
						<tr>
							<th>Store Banner</th>
							<td>
								<img src="<?= base_url() . $store['banner'] ?>" class="xs_thumbnail">
							</td>
						</tr>
						<tr>
							<th>Store</th>
							<td>:
								<?= $store["store"] ?>
							</td>
						</tr>
						<tr>
							<th>Description</th>
							
						</tr>
						
						<td colspan="2" class="pre_wrap">
							<?= $store["description"] ?>
						</td>
						
						<tr>
							<th>Type</th>
							<td>:
								<?= $store["gourmet_type"] ?>
							</td>
						</tr>
						<tr>
							<th>Pricing</th>
							<td>:
								<?= $store["pricing"] ?>
							</td>
						</tr>
						<tr>
							<th>Service Charge</th>
							<td>:
								<?= $store["service_charge"] ?>%
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
						<!-- <tr>
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
                    </tr> -->
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
						
						<tr>
							<th>Features</th>
							<td>
							</td>
						</tr>
						<?php
					foreach($store_feature as $row){
					?>
						<tr>
							<td colspan="2">
								<?= $row['feature'] ?>
							</td>
						</tr>
						<?php
					}
					?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>

		<div class="col-md-6">
			<div class="box box-primary">
				<div class='box-header'>
					<h4 class="whiteTitle" style='display: inline-block;'>Social media link</h4>

					<a href='<?php echo site_url("social_media_link/add"). '/' . $store['store_id'] ?>' class='btn btn-info pull-right'>
						<i class='fa fa-plus'></i> Add</a>

				</div>
				<div class='box-body no-padding'>

					<div id="refreshBox">
						<table id="data-table" class="table table-bordered table-hover data-table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Social Media</th>
									<th>Social Media Link</th>
									<th>Created Date</th>
									<!-- <th>Created By</th> -->
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									foreach($social_media_link as $row){
										?>
								<tr>
									<td>
										<a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
											<?= $i ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
											<?= $row['social_media'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
											<?= $row['social_media_link'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
											<?= $row['created_date'] ?>
										</a>
									</td>
									<!-- <td>
										<a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
											<?= $row['created_by'] ?>
										</a>
									</td> -->
									<td>
										<a href="<?= base_url() ?>social_media_link/delete/<?= $row['social_media_link_id']?>" class="btn btn-danger delete-button">Delete</a>
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
									<th>Social Media</th>
									<th>Social Media Link</th>
								
									<th>Created Date</th>
									<!-- <th>Created By</th> -->
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>			
		</div>
		



		<form method="POST" action="<?= base_url() ?>store_images/delete/<?= $store['store_id'] ?>">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">
							<?=$store['store']?>
						</h3>
						<a href="<?php echo site_url('store_images/add') . '/' . $store['store_id'] ?>" class='btn btn-default pull-right'>
							<i class='fa fa-plus'></i> Add</a>
						<button type="submit" class="btn btn-danger pull-right" style="margin-right: 2.5%;"><i class="fa fa-trash"></i>
							Delete</button>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<div class="row">
							<?php
						foreach($store_images as $row){
						?>
							<div class="col-sm-4 col-xs-12 multi_preview_wrapper">
								<input type="checkbox" id="image_checkbox_<?=$row['store_image_id']?>" value="<?=$row['store_image_id']?>" name="store_image_id[]" />
								<label class="image_checkbox_label" for="image_checkbox_<?=$row['store_image_id']?>" style="height:300px;">
									<img src="<?=base_url() . $row['image']?>" />
								</label>
							</div>
							<?php
						}
						?>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</form>
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
									<th></th>
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
								<td>
                                		<a href="<?= base_url() ?>food/delete_menu/<?= $row['food_id']?>" class="btn btn-danger delete-button">Delete</a>
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
		<div class="col-md-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?=$store['store']?>'s Table Lists
					</h3>
					<a href="<?php echo site_url('Table_no/add') . '/' . $store['store_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> Add</a>
				</div>

				<br>
				<div class='box-body no-padding'>
					<div id="refreshBox">
						<table id="data-table" class="table table-bordered table-hover data-table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Table Number</th>
									<th>Created Date</th>
									<th></th>
									<!-- <th>Created By</th> -->
									<!-- <th></th> -->
								</tr>
							</thead>
							<?php
								$i = 1;
								foreach($table as $row){
							?>
							<tr>
								<td>
									<?= $i ?>
								</td>
								<td>
									<?= $row['table_no'] ?>
								</td>
								<td>
									<?= $row['created_date'] ?>
								</td>
								<td>
									<a href="<?= base_url() ?>table_no/delete/<?= $row['table_no_id']?>" class="btn btn-danger delete-button">Delete</a>
									<a href="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= $row['store_id']?>_<?= $row['table_no_id'] ?>&choe=UTF-8" download target="_blank"><button class="btn btn-info">Download</button></a>
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
