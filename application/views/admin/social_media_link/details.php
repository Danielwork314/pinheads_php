<section class="content-header">
	<h1>
		<?= $social_media_link['social_media_link'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>social_media_link">
				<i class="fa fa-link"></i> Social media link</a>
		</li>
        <li>
			<a href="<?= base_url() ?>store/details/<?= $store['store_id'] ?>">
				<?= $store['store'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>social_media_link/details/<?= $social_media_link['social_media_link_id'] ?>">
				<?= $social_media_link['social_media_link'] ?>
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
					<?= $social_media_link['social_media_link'] ?>'s Info
				</h3>
				<a href="<?php echo site_url('social_media_link/edit') . '/' . $social_media_link['social_media_link_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Social media</th>
						<td>:
							<?= $social_media_link["social_media"] ?>
						</td>
					</tr>
					<tr>
						<th>Social media link</th>
						<td>:
							<?= $social_media_link["social_media_link"] ?>
						</td>
					</tr>
                    
					<tr>
						<th>Created Date</th>
						<td>:
							<?= $social_media_link["created_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Created By</th>
						<td>:
							<?= $social_media_link["created_by"] ?>
						</td>
					</tr> -->
					<tr>
						<th>Modified Date</th>
						<td>:
							<?= $social_media_link["modified_date"] ?>
						</td>
					</tr>
					<!-- <tr>
						<th>Modified By</th>
						<td>:
							<?= $social_media_link["modified_by"] ?>
						</td>
					</tr> -->
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
