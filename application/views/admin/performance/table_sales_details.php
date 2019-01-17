<section class="content-header">
	<h1>
		<?= $table_no['store'] ?> Table <?= $table_no['table_no'] ?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>performance/table_sales"><i class="fa fa-chart-area"></i> Table sales</a></li>
		<li><a href="<?= base_url() ?>performance/table_sales_details/<?= $table_no['table_no_id'] ?>"><?= $table_no['store'] ?> Table <?= $table_no['table_no'] ?></a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
                    <?= $table_no['store'] ?> Table <?= $table_no['table_no'] ?>
				</h3>
				<div class="row">
					<form method="GET">
						<div class="col-md-10 col-xs-12">
							<div class="row">
								<div class="col-md-3 col-xs-12">
									<?= $this->form->generate_select(array(
                                    "name" => "month",
                                    "selected" => $month,
                                    "hide_label" => true
                                ), array(
                                    "options" => $months,
                                    "value" => "value",
                                    "text" => "month"
                                )); ?>
								</div>
								<div class="col-md-3 col-xs-12">
									<?= $this->form->generate_select(array(
                                        "name" => "year",
                                        "selected" => $year,
                                        "hide_label" => true
                                    ), array(
                                        "options" => $years,
                                        "value" => "value",
                                        "text" => "year"
                                    )); ?>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-xs-12">
							<button type="input" class="btn btn-primary form-control">Filter</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<canvas id="sales_chart" width="400" height="100"></canvas>
                    </div>
                    <div class="col-xs-12">
						<table id="data-table" class="table table-bordered table-hover data-table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Sales No</th>
									<th>Total Sales</th>
									<th>Created Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                $i = 1;
                                foreach($sales as $row){
                                ?>
								<tr>
									<td><a target="_blank" href="<?= base_url() ?>sales/details/<?= $row['sales_id'] ?>"><?= $i ?></a></td>
									<td><a target="_blank" href="<?= base_url() ?>sales/details/<?= $row['sales_id'] ?>"><?= $row['sales_id'] ?></a></td>
                                    <td><a target="_blank" href="<?= base_url() ?>sales/details/<?= $row['sales_id'] ?>"><?= $row['total_sales'] ?></a></td>
                                    <td><a target="_blank" href="<?= base_url() ?>sales/details/<?= $row['sales_id'] ?>"><?= $row['created_date'] ?></a></td>
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
			<!-- /.box-body -->
		</div>
	</div>
</section>
<script>
	var sales_chart = document.getElementById("sales_chart");

	var sales_chart = new Chart(sales_chart, {
		type: 'line',
		data: {
			labels: [
                <?php
                foreach($sales_chart as $key => $row){
                    echo "'" . $key . "',";
                }
                ?>
            ],
			datasets: [{
				label: 'Year <?= $year ?> Sales',
				data: [
                    <?php
                    foreach($sales_chart as $key => $row){
                        echo "'" . $row . "',";
                    }
                    ?>
				],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

</script>
