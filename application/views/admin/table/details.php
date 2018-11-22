<section class="content-header">
	<h1>
		<?= $table['table_no'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>table">
            <i class="fas fa-clipboard-list"></i> Table</a>
		</li>
		<li>
			<a href="<?= base_url() ?>table/details/<?= $table['table_id'] ?>">
				<?= $table['table_no'] ?>
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
					<?= $table['table_no'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('table/edit') . '/' . $table['table_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Table No.</th>
						<td>:
							<?= $table["table_no"] ?>
						</td>
					</tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $table["created_date"] ?>
						</td>
					</tr>
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $table["modified_date"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
