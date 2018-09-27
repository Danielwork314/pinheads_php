<div class="modal-body">
	<h4>Details</h4>
	<table class="formTable">
		<tr>
			<th>Report Date</th>
			<td>
				:
				<?= date('d/m/Y', strtotime($project_report['date'])) ?>
			</td>
		</tr>
		<tr>
			<th>Report Title</th>
			<td>
				:
				<?= $project_report['title'] ?>
			</td>
		</tr>
		<tr>
			<th>Report</th>
		</tr>
	</table>
	<p class="pre-wrap">
		<?= $project_report['report'] ?>
	</p>
	<hr/>
	<h4>Sales</h4>
	<?php
foreach ($project_report_item as $row) {
	?>
		<table class="formTable">
			<tr>
				<th>Item</th>
				<td>
					:
					<?= $row['item'] ?>
				</td>
			</tr>
			<tr>
				<th>12pm - 3pm</th>
				<td>
					:
					<?= $row['time_12_3'] ?>
				</td>
			</tr>
			<tr>
				<th>3pm - 5pm</th>
				<td>
					:
					<?= $row['time_3_5'] ?>
				</td>
			</tr>
			<tr>
				<th>6pm - 9pm</th>
				<td>
					:
					<?= $row['time_6_9'] ?>
				</td>
			</tr>
			<tr>
				<th>Total</th>
				<td>
					:
					<?= $row['total'] ?>
				</td>
			</tr>
		</table>
		<p class="pre-wrap">
			<?= $project_report['report'] ?>
		</p>
		<?php

}
?>
		<hr/>
		<h4>Images</h4>
		<?php
	foreach ($project_report_image as $row) {
		?>
			<div class="modal_image_container">
				<img class="modal_image" src="<?= base_url() . $row['image'] ?>">
			</div>
			<br/>
			<?php

	}
	?>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<?php
		if($this->session->userdata("role_access")["project_report"]["update_control"] == 1){
			?>
			<a href="<?= base_url()?>project_report/edit/<?= $project_report['project_report_id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
			<?php
		}
	?>
</div>