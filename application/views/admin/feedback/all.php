<section class="content-header">
	<h1>
		Feedback
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>feedback"><i class="fas fa-comments"></i> Feedback</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Feedback</h4>

			<a href='<?php echo site_url("feedback/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>User</th>
                            <th>Feedback</th>
                            <th>Created Date</th>
                            <!-- <th>Created By</th> -->
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($feedback as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>feedback/details/<?= $row['feedback_id']?>">
									<?= $i ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>feedback/details/<?= $row['feedback_id']?>">
									<?= $row['user'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>feedback/details/<?= $row['feedback_id']?>">
									<?= $row['feedback'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>feedback/details/<?= $row['feedback_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="<?= base_url() ?>feedback/details/<?= $row['feedback_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td> -->
							<td>
                                <a href="<?= base_url() ?>feedback/delete/<?= $row['feedback_id']?>" class="btn btn-danger delete-button">Delete</a>
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
                            <th>Feedback</th>
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
