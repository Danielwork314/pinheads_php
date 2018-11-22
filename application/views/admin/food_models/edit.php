<section class="content-header">
	<h1>
    Edit Food Model
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-industry"></i>Edit Food Model</a>
		</li>
		<li>
            <a href="<?= base_url() ?>food_model/edit/<?= $food_model['food_model_id'] ?>"> Edit Food Model</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Food</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<?php
			if(!empty($error)){
				?>
					<br/>
					<div class='alert alert-danger alert-dismissable' style="margin-left:10%;margin-right:10%;">
                        <?= $error; ?>
                    </div>
				<?php
			}
		?>		
		<form role="form" class="input_form" method="POST" action="<?= base_url() ?>food_models/edit/<?= $food_model['food_model_id']?>">
            <div class="box-body">
				<div class="form-group">
					<label>Model</label>
					<input type="text" class="form-control" placeholder="Model" value="<?= $food_model['food_model']?>" name="food_model">
				</div>
				<div class="form-group">
					<label>SKU</label>
					<input type="text" class="form-control" placeholder="SKU" value="<?= $food_model['SKU']?>" name="SKU">
				</div>
				<hr/>
				<input type="submit" class="btn btn-flat btn-info">
			</div>			
			<!-- /.box-body -->
		</form>
	</div>
</section>