<section class="content-header">
	<h1>
		<?= $food['food'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-utensils"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food/details/<?= $food['food_id'] ?>">
				<?= $food['food'] ?>
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
					<?= $food['food'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('food/edit') . '/' . $food['food_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Food Image</th>
						<td>:
							<a href="<?= base_url() ?>food/details/<?= $food['food_id']?>">
								<img src="<?= base_url() . $food['image'] ?>" class="xs_thumbnail">
                        	</a>
						</td>
					</tr>
					<tr>
						<th>Food Title</th>
						<td>:
							<?= $food["food"] ?>
						</td>
					</tr>
					<tr>
						<th>Food Description</th>
						<td>:
							<?= $food["description"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food_Price</th>
						<td>:
							<?= $food["price"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Food Discount</th>
						<td>:
							<?= $food["discount"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Store</th>
						<td>:
							<?= $food["store"] ?>
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
						<?=$food['food']?>'s Ingredient Lists
					</h3>
					
			</div>
				
			<br>

			<div class='box-body no-padding'>
				<div id="refreshBox">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
						<tr>
							<th>No.</th>
							<th>Ingredient </th>
						</tr>
						</thead>
						<?php
							$i = 1;
							foreach($food_ingredient as $row){
								?>
								<tr>
									<td>
										<a href="<?= base_url() ?>food_ingredient/details/<?= $row['food_ingredient_id']?>">
											<?= $i ?>
                                		</a>
									</td>
									
									<td>
										<a href="<?= base_url() ?>food_ingredient/details/<?= $row['food_ingredient_id']?>">
											<?= $row['ingredient'] ?>
										</a>
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
