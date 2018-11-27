<section class="content-header">
	<h1>
		Gourmet Type
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>gourmet_type"><i class="fa fa-mortar-pestle"></i> Gourmet Type</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Gourmet Type</h4>

			<a href='<?php echo site_url("gourmet_type/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Gourmet Type</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($gourmet_type as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>gourmet_type/details/<?= $row['gourmet_type_id']?>">
									<?= $i ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>gourmet_type/details/<?= $row['gourmet_type_id']?>">
									<?= $row['gourmet_type'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>gourmet_type/details/<?= $row['gourmet_type_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url() ?>gourmet_type/details/<?= $row['gourmet_type_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td> -->
							<td>
                                <a href="<?= base_url() ?>gourmet_type/delete/<?= $row['gourmet_type_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Gourmet Type Title</th>
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
