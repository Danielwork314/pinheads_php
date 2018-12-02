<section class="content-header">
	<h1>
		Banner
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>banner"><i class="fa fa-image"></i> Banner</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Banner</h4>

			<a href='<?php echo site_url("banner/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Banner</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($banner as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>banner/details/<?= $row['banner_id']?>">
									<?= $i ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>banner/details/<?= $row['banner_id']?>">
									<img src="<?= base_url() . $row['image'] ?>" class="xs_thumbnail">
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>banner/details/<?= $row['banner_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>banner/delete/<?= $row['banner_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Banner</th>
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
