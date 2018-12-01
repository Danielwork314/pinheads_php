<section class="content-header">
	<h1>
		Table
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>table_position"><i class="fas fa-clipboard-list"></i> Table</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Table</h4>

			<a href='<?php echo site_url("table_position/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Table No.</th>
                            <th>Created Date</th>
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($table_position as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>table_position/details/<?= $row['table_position_id']?>">
									<?= $i ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>table_position/details/<?= $row['table_position_id']?>">
									<?= $row['table_position'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>table_position/details/<?= $row['table_position_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>table_position/delete/<?= $row['table_position_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Table No.</th>
                            <th>Created Date</th>
                            <th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</section>
