<section class="content-header">
	<h1>
		Dressing
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>dressing"><i class="fa fa-birthday-cake"></i> Dressing</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Dressing</h4>

			<a href='<?php echo site_url("dressing/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>dressing</th>
                            <th>Created Date</th>
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($dressing as $row){
                                ?>
						<tr>
							<td>
								<?= $i ?>
                            </td>
							<td>
								<?= $row['dressing'] ?>
                            </td>
                            <td>
								<?= $row['created_date'] ?>
                            </td>
							<td>
                                <a href="<?= base_url() ?>dressing/delete/<?= $row['dressing_id']?>" class="btn btn-danger delete-button">Delete</a>
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
