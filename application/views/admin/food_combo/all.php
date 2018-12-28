<section class="content-header">
	<h1>
		Food Combo
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>food_combo"><i class="fa fa-utensils"></i> Food_combo</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Food_combo</h4>

			<a href='<?php echo site_url("food_combo/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Store </th>
                            <th>Image</th>
							<th>Title</th>
							<th>Description</th>
                            <th>Price</th>
                            <th>Discounted Price</th>
                            <th>Discount (%)</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($food_combo as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $i ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $row['store'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<img src="<?= base_url() . $row['image'] ?>" class="xs_thumbnail">
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $row['food_combo'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $row['description'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $row['price'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $row['discounted_price'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $row['discount'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>food_combo/details/<?= $row['food_combo_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url() ?>food/details/<?= $row['food_combo_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td> -->
							<td>
                                <a href="<?= base_url() ?>food_combo/delete/<?= $row['food_combo_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Store </th>
                            <th>Image</th>
							<th>Title</th>
							<th>Description</th>
                            <th>Price</th>
                            <th>Discounted Price</th>
                            <th>Discount (%)</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</section>
