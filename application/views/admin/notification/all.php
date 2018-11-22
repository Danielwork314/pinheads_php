<section class="content-header">
	<h1>
		Notification
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>notification"><i class="fa fa-bell"></i> Notification</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Notification</h4>

			<a href='<?php echo site_url("notification/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>User ID</th>
							<th>Notification Title</th>
							<th>Notification Description</th>
							<th>End Date</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($notification as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>notification/details/<?= $row['notification_id']?>">
									<?= $i ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>notification/details/<?= $row['notification_id']?>">
									<?= $row['user_id'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>notification/details/<?= $row['notification_id']?>">
									<?= $row['notification'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>notification/details/<?= $row['notification_id']?>">
									<?= $row['description'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>notification/details/<?= $row['notification_id']?>">
									<?= $row['end_date'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>notification/details/<?= $row['notification_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url() ?>notification/details/<?= $row['notification_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td> -->
							<td>
                                <a href="<?= base_url() ?>notification/delete/<?= $row['notification_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>User ID</th>
							<th>Notification Title</th>
							<th>Notification Description</th>
							<th>End Date</th>
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
