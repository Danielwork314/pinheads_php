<section class="content-header">
	<h1>
		Store sales
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>performance/store_sales"><i class="fa fa-chart-area"></i> Store sales</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Store sales</h4>
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
		<div class='box-body no-padding'>
			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Store</th>
							<th>Total Sales</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($store as $row){
                                ?>
						<tr>
							<td><a href="<?= base_url() ?>performance/store_sales_details/<?= $row['store_id'] ?>"><?= $i ?></a></td>
							<td><a href="<?= base_url() ?>performance/store_sales_details/<?= $row['store_id'] ?>"><?= $row['store'] ?></a></td>
							<td><a href="<?= base_url() ?>performance/store_sales_details/<?= $row['store_id'] ?>"><?= $row['total_sales'] ?></a></td>
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
							<th>Total Sales</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</section>
