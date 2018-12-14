<section class="content-header">
	<h1>
		<?= $customize['customize'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>customize">
				<i class="fa fa-share-square"></i> Customize</a>
		</li>
		<li>
			<a href="<?= base_url() ?>customize/details/<?= $customize['customize_id'] ?>">
				<?= $customize['customize'] ?>
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
					<?= $customize['customize'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('customize/edit') . '/' . $customize['customize_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Customize</th>
						<td>:
							<?= $customize["customize"] ?>
						</td>
					</tr>
					<tr>
						<th>Dressing Menu</th>
						<td>:
							<?php $i = 1; foreach($dressing as $row){ ?>
								<?= $row["dressing"] ?>
								<?php if(count($dressing) != $i){ ?>, <?php } ?>
							<?php $i++; } ?>
						</td>
					</tr>
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $customize["created_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Created By</th>
						<td>:
							<?= $customize["created_by"] ?>
						</td>
					</tr> -->
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $customize["modified_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Modified By</th>
						<td>:
							<?= $customize["modified_by"] ?>
						</td>
					</tr> -->
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
