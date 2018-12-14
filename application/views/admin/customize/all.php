<section class="content-header">
	<h1>
		Customize
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>customize"><i class="fa fa-filter"></i> Customize</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Customize</h4>

			<a href='<?php echo site_url("customize/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>customize</th>
                            <th>Created Date</th>
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($customize as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>customize/details/<?= $row['customize_id']?>">
									<?= $i ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>customize/details/<?= $row['customize_id']?>">
									<?= $row['customize'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>customize/details/<?= $row['customize_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>customize/delete/<?= $row['customize_id']?>" class="btn btn-danger delete-button">Delete</a>
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
