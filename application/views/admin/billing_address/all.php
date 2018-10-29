<section class="content-header">
	<h1>
		Billing Address
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>billing_address"><i class="fa fa-gift"></i> Billing Address</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Billing Address</h4>

			<a href='<?php echo site_url("billing_address/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Country</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th></th>
						</tr>
					</thead>
					<tbody>
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
                                <a href="<?= base_url() ?>billing_address/details/<?= $row['billing_address_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>billing_address/delete/<?= $row['billing_address_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Country</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</section>
