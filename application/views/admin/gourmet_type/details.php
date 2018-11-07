<section class="content-header">
	<h1>
		<?= $gourmet_type['gourmet_type_title'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>gourmet_type">
				<i class="fa fa-mortar-pestle"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food/details/<?= $gourmet_type['gourmet_type_id'] ?>">
				<?= $gourmet_type['gourmet_type_title'] ?>
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
					<?= $gourmet_type['gourmet_type_title'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('gourmet_type/edit') . '/' . $gourmet_type['gourmet_type_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Gourmet Type Title</th>
						<td>:
							<?= $gourmet_type["gourmet_type_title"] ?>
						</td>
					</tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $gourmet_type["created_date"] ?>
						</td>
					</tr>
					<tr>
						<th>Created By</th>
						<td>:
							<?= $gourmet_type["created_by"] ?>
						</td>
					</tr>
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $gourmet_type["modified_date"] ?>
						</td>
					</tr>
					<tr>
						<th>Modified By</th>
						<td>:
							<?= $gourmet_type["modified_by"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
