<section class="content-header">
	<h1>
		Add Food
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food">
				<i class="fa fa-utensils"></i> Food</a>
		</li>
		<li>
			<a href="<?= base_url() ?>food/add"> Add food</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Food</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" class="input_form" method="POST" action="<?= base_url()?>food/add" enctype="multipart/form-data">
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
						<label>Image</label>
						<input type="file" class="form-control" name="file" id="file" required>
					</div>
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="food" id="form_food" required placeholder="Food title">
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" name="description" id="form_description" required placeholder="Food description">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control" name="price" id="form_price" required placeholder="Food Price">
					</div>
					<div class="form-group">
						<label>Discount (%)</label>
						<input type="text" class="form-control" name="discount" id="form_discount" required placeholder="Food discount">
					</div>
					<div class="form-group">
						<label>Store</label>
						<select class="form-control" required name="store_id" id="form_store_id">
							<option value="none">None</option>
								<?php foreach ($store as $row) { ?>
									<option value="<?= $row['store_id'] ?>"><?= $row['store'] ?></option>
								<?php } ?>
						</select>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="button" id="submit_food" class="btn btn-primary pull-right">Submit</button>
				</div>
			</form>
		</div>
	</div>

	<div class="col-md-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Menu's Ingredient</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
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
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label>Ingredient</label>
                            <select class="form-control" required name="ingredient_id" id="selection_ingredient">
                                <?php foreach ($ingredient as $row) { ?>
                                    <option value="<?= $row['ingredient_id'] ?>"><?= $row['ingredient'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    
                        <div class="col-md-2" style="padding-top: 24px;">
                            <button type="button" id="confirm_ingredient" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <table id="" class="table table-hover table-stripe">
                            <thead>
                                <tr>
                                    <th width="40%">Ingredient On Lists</th>
                                    <th width="40%"></th>
                                </tr>
                            </thead>
                            <tbody id="ingredient_list"></tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
        </div>
    </div>

</section>

<script>

var ingredient_array = [];

$("#confirm_ingredient").click(function () {

	var selected = $('#selection_ingredient').val();
	var selected_ingredient_text = $("#selection_ingredient").children(":selected").text();

	var ingredient_details = {
		ingredient_id : selected,
		ingredient : selected_ingredient_text
	};

	postParam = {
		// ingredient_id: selected,
		// ingredient : selected_ingredient_text
		ingredient_detail:ingredient_details
	}

	$.post("<?= base_url() ?>Food/add_ingredient", postParam, function(response){
		// alert(response);

		var html = '<tr>';
			html += '<td>' + selected_ingredient_text + '</td>';
			html += '<td><button type="button" name="delete" id="delete" class="btn btn-danger pull-right" >Remove</button></td>';
			html += '</tr>';

			ingredient_array.push(selected);

			// console.log(ingredient_array);
		
			$("#ingredient_list").append(html);
			$("#ingredient_list").on('click', '#delete', function () {
			$(this).closest('tr').remove();
		});
	});
	

});

$("#submit_food").click(function(e){

	// var fd = new FormData();
	// var files = $('#file')[0].files[0];
	// fd.append('file',files);


	var file = $("#file").val();
	var food = $("#form_food").val();
	var description = $("#form_description").val();
	var price = $("#form_price").val();
	var discount = $("#form_discount").val();
	var store_id = $("#form_store_id").val();

	var food_list = {
		file : file,
		food : food,
		description : description,
		price : price,
		discount : discount,
		store_id : store_id,
		ingredient_id: ingredient_array,
		contentType : false,
		processData : false,
	};

	postParam = {
		food_list : food_list,
	}

	// console.log(postParam);

	 $.post("<?= base_url()?>food/add/", postParam, function(response){
		window.location.replace("<?=base_url()?>food");
	 });
});
		
</script>