<section class="content-header">
	<h1>
		Dashboard
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>dashboard">
				<i class="fa fa-tachometer-alt"></i> Dashboard</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="row">
		<a href="#undated_projects">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green">
						<i class="fa fa-folder"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Undated
							<br> Projects</span>
						<span class="info-box-number">
							<?= count($undated_projects) ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		</a>
		<!-- /.col -->
		<a href="#on_going_projects">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua">
						<i class="fa fa-folder-open"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Ongoing
							<br>Projects</span>
						<span class="info-box-number">
							<?= count($ongoing_projects["ongoing_projects"]) ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		</a>

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<!-- /.col -->
		<a href="#reports_behind">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red">
						<i class="fa fa-file-excel"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Reports
							<br>Behind</span>
						<span class="info-box-number">
							<?= $ongoing_projects["reports_behind"] ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		</a>
		<!-- /.col -->

		<a href="#unpublished_reports">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow">
						<i class="fa fa-file-upload"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Unpublished
							<br>Reports</span>
						<span class="info-box-number">
							<?= count($unpublished_reports) ?>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		</a>
		<!-- /.col -->
		<div class="col-xs-12">
			<div id="undated_projects" class="col-md-6 col-xs-12">
				<div class="box box-success box-limit">
					<div class='box-header'>
						<h4 class="whiteTitle" style='display: inline-block;'>Undated Projects</h4>
					</div>
					<div class='box-body no-padding'>
						<div id="refreshBox">
							<table id="data-table" class="table table-bordered table-hover data-table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Project</th>
										<th>Outlet</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$i = 1;
								$temp_project_id = "";
								foreach ($undated_projects as $row) {
									if ($row["project_id"] != $temp_project_id) {
										$first_row = true;
										$temp_project_id = $row["project_id"];
									} else {
										$first_row = false;
									}
									?>
										<tr>
											<td>
												<?= ($first_row) ? $i : "" ?>
											</td>
											<td>
												<?= ($first_row) ? $row['project'] : "" ?>
											</td>
											<td>
												<a href="<?= base_url() ?>project_outlet/details/<?= $row['project_id'] ?>/<?= $row['project_outlet_id'] ?>">
													<?= $row['outlet'] ?>
												</a>
											</td>
										</tr>
										<?php
									if ($first_row) {
										$i++;
									}
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="on_going_projects" class="col-md-6 col-xs-12">
				<div class="box box-info box-limit">
					<div class='box-header'>
						<h4 class="whiteTitle" style='display: inline-block;'>On Going Projects</h4>
					</div>
					<div class='box-body no-padding'>
						<div id="refreshBox">
							<table id="data-table" class="table table-bordered table-hover data-table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>PIC</th>
										<th>Start Date</th>
										<th>End Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
								$i = 1;
								foreach ($ongoing_projects["ongoing_projects"] as $row) {
									?>
										<tr>
											<td>
												<a href="<?= base_url() ?>project/details/<?= $row['project_id'] ?>">
													<?= $i ?>
												</a>
											</td>
											<td>
												<a href="<?= base_url() ?>project/details/<?= $row['project_id'] ?>">
													<?= $row['name'] ?>
												</a>
											</td>
											<td>
												<a href="<?= base_url() ?>project/details/<?= $row['project_id'] ?>">
													<?= $row['pic'] ?>
												</a>
											</td>
											<td>
												<a href="<?= base_url() ?>project/details/<?= $row['project_id'] ?>">
													<?= $row['start_date'] ?>
												</a>
											</td>
											<td>
												<a href="<?= base_url() ?>project/details/<?= $row['project_id'] ?>">
													<?= $row['end_date'] ?>
												</a>
											</td>
										</tr>
										<?php
									$i++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<div id="reports_behind" class="col-md-6 col-xs-12">
				<div class="box box-danger box-limit">
					<div class='box-header'>
						<h4 class="whiteTitle" style='display: inline-block;'>Reports Behind</h4>
					</div>
					<div class='box-body no-padding'>
						<div id="refreshBox">
							<table id="data-table" class="table table-bordered table-hover data-table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Project</th>
										<th>Outlet</th>
										<th>Report Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
								$i = 1;
								$first_row = true;
								foreach ($ongoing_projects["ongoing_projects"] as $row) {
									foreach ($row["project_outlets"] as $outlet_row) {
										$first_outlet = true;
										for ($days = 0; $days < $outlet_row["reports_behind"]; $days++) {
											?>
										<tr>
											<td>
												<?= ($first_row) ? $i : "" ?>
											</td>
											<td>
												<?= ($first_row) ? $row['name'] : "" ?>
											</td>
											<td>
												<?= ($first_outlet) ? $outlet_row['outlet'] : "" ?>
											</td>
											<td>
												<a href="<?= base_url() ?>project_report/add/<?= $row['project_id'] ?>/<?= $outlet_row['project_outlet_id'] ?>/<?= date('d-m-Y', strtotime($outlet_row['report_start_date'] . ' + ' . $days . 'days ')) ?>" target="_blank">
													<?= date("d-m-Y", strtotime($outlet_row["report_start_date"] . " + " . $days . "days")) ?>
												</a>
											</td>
										</tr>
										<?php
									$first_row = false;
									$first_outlet = false;
								}
							}
							$i++;
							$first_row = true;
						}
						?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="unpublished_reports" class="col-md-6 col-xs-12">
				<div class="box box-warning box-limit">
					<div class='box-header'>
						<h4 class="whiteTitle" style='display: inline-block;'>Unpublished Projects</h4>
					</div>
					<div class='box-body no-padding'>
						<div id="refreshBox">
							<table id="data-table" class="table table-bordered table-hover data-table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Project</th>
										<th>Outlet</th>
										<th>Report Title</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$i = 1;
								foreach ($unpublished_reports as $row) {
									?>
										<tr>
											<td>
												<?= $i ?>
											</td>
											<td>
												<?= $row["project"] ?>
											</td>
											<td>
												<?= $row['outlet'] ?>
											</td>
											<td>
												<a href="<?= base_url() ?>project_outlet/details/<?= $row['project_id'] ?>/<?= $row['project_outlet_id'] ?>">
													<?= $row['title'] ?>
												</a>
											</td>
										</tr>
										<?php
									if ($first_row) {
										$i++;
									}
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>