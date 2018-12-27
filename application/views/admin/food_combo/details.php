<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		<?= $food_combo['food_combo'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food_combo">
				<i class="fa fa-utensils"></i> Food Combo</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food_combo/details/<?= $food_combo['food_combo_id'] ?>">
				<?= $food_combo['food_combo'] ?>
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
					<?= $food_combo['food_combo'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('food_combo/edit') . '/' . $food_combo['food_combo_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<!-- <th>Food Image</th> -->
						<td>
							<a href="<?= base_url() ?>food_combo/details/<?= $food_combo['food_combo_id']?>">
								<img src="<?= base_url() . $food_combo['image'] ?>" class="xs_thumbnail">
                        	</a>
						</td>
					</tr>
					<tr>
						<th>Food Combo</th>
						<td>:
							<?= $food_combo["food_combo"] ?>
						</td>
					</tr>
					<tr>
						<th>Customize Set</th>
						<td>:
							<?php $i = 1; foreach($customize as $row){ ?>
								<?= $row["customize"] ?>
								<?php if(count($customize) != $i){ ?>, <?php } ?>
							<?php $i++; } ?>
						</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<th>Description</th>
						<td></td>
                    </tr>
					<tr>
						<td colspan="4" class="pre_wrap"><?= $food_combo["description"] ?></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
                    <tr>
						<th>Price</th>
						<td>:
							<?= $food_combo["price"] ?>
						</td>
					</tr>
					<tr>
						<th>Discounted Price</th>
						<td>:
							<?= $food_combo["discounted_price"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Discount (%)</th>
						<td>:
							<?= $food_combo["discount"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Store</th>
						<td>:
							<?= $food_combo["store"] ?>
						</td>
                    </tr>
					<tr>
						<th>Inventory</th>
						<td>:
							<?= $food_combo["inventory"] ?>
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
					<?=$food_combo['food_combo']?>'s Food list
				</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="table">
					<tr>
						<th>No.</th>
						<th>Food Image</th>
						<th>Food</th>
					</tr>
					<?php
					$i = 1;
					foreach($food_list as $row){
					?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<img src="<?= base_url() . $row['image'] ?>" class="xs_thumbnail">
						</td>
						<td>
							<?= $row['food'] ?>
						</td>
					</tr>
					<?php
					$i++;
					}
					?>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
</div>