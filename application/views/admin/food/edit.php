<section class="content-header">
	<h1>
		Edit food
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-utensils"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Food/edit/<?= $food['food_id'] ?>"> Edit food</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Food</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>food/edit/<?= $food['food_id'] ?>" enctype="multipart/form-data">
			<div class="box-body">
				<?php 
				if (isset($error)) { 
					?>
					<div class="alert alert-danger alert-dismissable">
						<?= $error; ?>						
					</div>
					<?php 
				}
                ?>
                
                <div class="form-group">
                    <img class="img-thumbnail" src="<?= base_url() . $food['image'] ?>" style="width:50%; height:50%;">
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="food" required value="<?= $food['food'] ?>">
				</div>
                <div class="form-group">
					<label>Description</label>
					<input type="text" class="form-control" name="description" required value="<?= $food['description'] ?>">
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="text" class="form-control" name="price" required value="<?= $food['price'] ?>">
				</div>
				<div class="form-group">
					<label>Discount (%)</label>
					<input type="text" class="form-control" name="discount" required value="<?= $food['discount'] ?>">
				</div>
				<div class="form-group">
					<label>Store</label>
                    <select class="form-control" required name="store_id" id="form_store_id">
                        <option value="none">None</option>
                        <?php foreach ($store as $row) { ?>
                            <option value="<?= $row['store_id'] ?>" <?php if($row['store_id'] == $food['store_id']){ ?> selected <?php } ?>><?= $row['store'] ?></option>
                        <?php } ?>
                    </select>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
