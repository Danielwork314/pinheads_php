<div class="content-container" style="display: flow-root;">
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
						<!-- <th>Food Image</th> -->
						<td>
							<a href="<?= base_url() ?>food/details/<?= $food['food_id']?>">
								<img src="<?= base_url() . $food['image'] ?>" class="xs_thumbnail">
                        	</a>
						</td>
					</tr>
					<tr>
						<th>Food</th>
						<td>:
							<?= $food["food"] ?>
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
						<td colspan="4" class="pre_wrap"><?= $food["description"] ?></td>
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
							<?= $food["price"] ?>
						</td>
					</tr>
					<tr>
						<th>Discounted Price</th>
						<td>:
							<?= $food["discounted_price"] ?>
						</td>
                    </tr>
                    <tr>
						<th>Discount (%)</th>
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
					<?=$food['food']?>'s Models
				</h3>
					<a href="<?php echo site_url('food_models/add') . '/' . $food['food_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-plus'></i> Add</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="table">
					<tr>
						<th>No.</th>
						<th>Model</th>
						<th>SKU</th>
						<th>Quantity</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					<?php
					$i = 1;
					foreach($food_model as $row){
					?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= $row['food_model'] ?>
						</td>
						<td>
							<?= $row['SKU'] ?>
						</td>
						<td>
							<?= $row['quantity'] ?>
						</td>
						<td>
							<a data-id="<?= $row['food_model_id']; ?>" data-qty="<?= $row['quantity']; ?>" data-toggle='modal' data-target='#quantityModal' class="btn btn-default btn-flat qtyChange"><i class="fa fa-plus"></i> <i class="fa fa-minus"></i></a>
						</td>
						<td>
                            <a href="<?= base_url() ?>food_models/edit/<?= $row['food_model_id'] ?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                        </td>
						<td>
							<a href="<?= base_url() ?>food_models/delete/<?= $row['food_model_id'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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

<div id="quantityModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Quantity</h4>
            </div>
			<form method="POST">
            	<div class="modal-body">
               
                    <label>Quantity</label>
                    <input type="hidden" name="food_model_id" id="food_model_id" value="0">
                    <input type="number" class="form-control" name="quantity" id="quantity">
                    
            	</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success" value="Save" name="submit">
				</div>
			</form>
        </div>

    </div>
</div>

<script>
    $(".qtyChange").click(function () {
        var qty = $(this).data("qty");
        var id = $(this).data("id");
        $("#food_model_id").val(id);
        $("#quantity").val(qty);
    });
</script>