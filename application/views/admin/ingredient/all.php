<section class="content-header">
	<h1>
		Ingredient
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url() ?>ingredient"><i class="fa fa-clipboard-list"></i> Ingredient</a></li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box">
		<div class='box-header'>
			<h4 class="whiteTitle" style='display: inline-block;'>Ingredient</h4>

			<a href='<?php echo site_url("ingredient/add"); ?>' class='btn btn-info pull-right'>
				<i class='fa fa-plus'></i> Add</a>

		</div>
		<div class='box-body no-padding'>

			<div id="refreshBox">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Ingredient Title</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $i = 1;
                            foreach($ingredient as $row){
                                ?>
						<tr>
							<td>
                                <a href="<?= base_url() ?>ingredient/details/<?= $row['ingredient_id']?>">
									<?= $i ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>ingredient/details/<?= $row['ingredient_id']?>">
									<?= $row['ingredient_title'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>ingredient/details/<?= $row['ingredient_id']?>">
									<?= $row['created_date'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>ingredient/details/<?= $row['ingredient_id']?>">
									<?= $row['created_by'] ?>
                                </a>
                            </td>
							<td>
                                <a href="<?= base_url() ?>ingredient/delete/<?= $row['ingredient_id']?>" class="btn btn-danger delete-button">Delete</a>
                            </td>
						</tr>
						<?php
                                $i++;
                            }
                        ?>
					</tbody>
					<tfoot>
						<tr>
                            <th>No.</th>
                            <th>Ingredient Title</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</section>
