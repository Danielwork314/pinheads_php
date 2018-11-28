<section class="content-header">
	<h1>
		Pricing
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>pricing"><i class="fa fa-money-bill-alt"></i> Pricing</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Pricing</h4>

			<a href='<?php echo site_url("pricing/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Pricing</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($pricing as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>pricing/details/<?= $row['pricing_id']?>">
									<?= $i ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>pricing/details/<?= $row['pricing_id']?>">
									<?= $row['pricing'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>pricing/details/<?= $row['pricing_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url() ?>pricing/details/<?= $row['pricing_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td> -->
							<td>
                                <a href="<?= base_url() ?>pricing/delete/<?= $row['pricing_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Pricing</th>
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
