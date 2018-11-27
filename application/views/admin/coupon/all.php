<section class="content-header">
	<h1>
		Coupon
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>coupon"><i class="fas fa-money-bill-wave"></i> Coupon</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Coupon</h4>

			<a href='<?php echo site_url("coupon/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Store Title</th>
							<th>Coupon Title</th>
							<th>Coupon Description</th>
                            <th>Valid Date</th>
                            <th>Number Assigned</th>
							<th>Partner Coupon</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($coupon as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $i ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $row['store'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $row['coupon'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $row['description'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $row['valid_date'] ?>
                                </a>
                            </td>   
                            <td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $row['number'] ?>
                                </a>
                            </td>                            
                            <td>
                                <?php if($row['partner_coupon'] == 0){ ?>
                                    <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">NO</a>
                                <?php } else { ?>
                                    <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">YES</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url() ?>coupon/details/<?= $row['coupon_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td> -->
							<td>
                                <a href="<?= base_url() ?>coupon/delete/<?= $row['coupon_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Store ID</th>
							<th>Coupon Title</th>
							<th>Coupon Description</th>
                            <th>Valid Date</th>
                            <th>Number Assigned</th>
							<th>Partner Coupon</th>
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
