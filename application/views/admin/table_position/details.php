<section class="content-header">
	<h1>
		<?= $table_position['table_position'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>table_position">
            <i class="fas fa-clipboard-list"></i> Table</a>
		</li>
		<li>
			<a href="<?= base_url() ?>table_position/details/<?= $table_position['table_position_id'] ?>">
				<?= $table_position['table_position'] ?>
			</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?= $table_position['table_position'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('table_position/edit') . '/' . $table_position['table_position_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Table No.</th>
						<td>:
							<?= $table_position["table_position"] ?>
						</td>
					</tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $table_position["created_date"] ?>
						</td>
					</tr>
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $table_position["modified_date"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
