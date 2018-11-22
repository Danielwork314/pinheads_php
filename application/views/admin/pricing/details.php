<section class="content-header">
	<h1>
		<?= $pricing['pricing_title'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>pricing">
				<i class="fa fa-money-bill-alt"></i> Pricing</a>
		</li>
		<li>
			<a href="<?= base_url() ?>pricing/details/<?= $pricing['pricing_id'] ?>">
				<?= $pricing['pricing_title'] ?>
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
					<?= $pricing['pricing_title'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('pricing/edit') . '/' . $pricing['pricing_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Pricing Title</th>
						<td>:
							<?= $pricing["pricing_title"] ?>
						</td>
					</tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $pricing["created_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Created By</th>
						<td>:
							<?= $pricing["created_by"] ?>
						</td>
					</tr> -->
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $pricing["modified_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Modified By</th>
						<td>:
							<?= $pricing["modified_by"] ?>
						</td>
					</tr> -->
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
