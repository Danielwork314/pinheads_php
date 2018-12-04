<section class="content-header">
	<h1>
		Socail media link
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>social_media_link"><i class="fa fa-link"></i> Social media link</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Social media link</h4>

			<a href='<?php echo site_url("social_media_link/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Store</th>
                            <th>Social Media Link</th>
                            <th>URL</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($social_media_link as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
									<?= $i ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
									<?= $row['store'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
									<?= $row['social_media_link'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
									<?= $row['url'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url() ?>social_media_link/details/<?= $row['social_media_link_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td> -->
							<td>
                                <a href="<?= base_url() ?>social_media_link/delete/<?= $row['social_media_link_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Store</th>
                            <th>Social Media Link</th>
                            <th>URL</th>
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
