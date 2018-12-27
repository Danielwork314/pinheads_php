<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		Add Food Combo
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Food_combo">
				<i class="fa fa-utensils"></i> Food Combo</a>
		</li>
		<li>
			<a href="<?= base_url() ?>food_combo/add"> Add food Combo</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Food Combo</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" class="input_form" id="food_form" method="POST" action="<?= base_url()?>food_combo/add" enctype="multipart/form-data">
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

					<?= $input_field['food_combo'] ?>
					<?= $input_field['food_category_id'] ?>
					<?= $input_field['description'] ?>
					<?= $input_field['price'] ?>
					<?= $input_field['discounted_price'] ?>
					<?= $input_field['discount'] ?>
					<?= $input_field['store_id'] ?>
					<!-- <?= $input_field['inventory'] ?> -->
					<!-- <div class="form-group">
						<label>Food</label>
						<input type="text" class="form-control" name="food" id="form_food" required placeholder="Food title">
					</div>
					<div class="form-group">
						<label>Food Category</label>
						<select class="form-control" required name="food_category_id" id="form_food_category_id">
							<?php foreach ($food_category as $row) { ?>
								<option value="<?= $row['food_category_id'] ?>"><?= $row['food_category'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea type="text" class="form-control" name="description" id="form_description" rows="4" required placeholder="Food description"></textarea>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control" name="price" id="form_price" required placeholder="Food Price">
					</div>
					<div class="form-group">
						<label>Discounted Price</label>
						<input type="text" class="form-control" name="discounted_price" id="form_discounted_price" required placeholder="Discounted Price">
					</div>
					<div class="form-group">
						<label>Discount (%)</label>
						<input type="text" class="form-control" name="discount" id="form_discount" required placeholder="Food discount">
					</div>
					<div class="form-group">
						<label>Store</label>
						<select class="form-control" required name="store_id" id="form_store_id">
							<?php foreach ($store as $row) { ?>
								<option value="<?= $row['store_id'] ?>"><?= $row['store'] ?></option>
							<?php } ?>
						</select>
					</div> -->
				</div>
				<!-- /.box-body -->
			</form>
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Food</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<div class="form-group">
					<div class="col-md-9 customize_menu">
						<label>Food Menu</label>
						<div class="form_food">
						<select class="form-control select2" required id="food_id">
							<?php foreach ($food as $row) { ?>
								<option value="<?= $row['food_id'] ?>"><?= $row['food'] ?> - <?= $row['store'] ?></option>
							<?php } ?>
						</select>
						</div>
					</div>
				
					<div class="col-md-3 customize_menu" style="padding-top: 24px;">
						<button type="button" id="add_food" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</button>
					</div>
				</div>
				<div class="form-group">
                    <table class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th width="70%" class="food_tr">Food List</th>
                                <th width="30%"></th>
                            </tr>
                        </thead>
                        <tbody id="food_list"></tbody>
                    </table>
                </div>
			</div>
			<div class="box-footer">
				<!-- <button type="button" id="submit_food" class="btn btn-primary pull-right">Submit</button> -->
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Customize</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<div class="form-group">
					<div class="col-md-9 customize_menu">
						<label>Customize Menu</label>
						<div class="form_food">
						<select class="form-control select2" required id="customize_id">
							<?php foreach ($customize as $row) { ?>
								<option value="<?= $row['customize_id'] ?>"><?= $row['customize'] ?></option>
							<?php } ?>
						</select>
						</div>
					</div>
				
					<div class="col-md-3 customize_menu" style="padding-top: 24px;">
						<button type="button" id="add_customize" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</button>
					</div>
				</div>
				<div class="form-group">
                    <table class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th width="70%" class="customize_tr">Customize List</th>
                                <th width="30%"></th>
                            </tr>
                        </thead>
                        <tbody id="customize_list"></tbody>
                    </table>
                </div>
			</div>
			<div class="box-footer">
				<button type="button" id="submit_food" class="btn btn-primary pull-right">Submit</button>
			</div>
		</div>
	</div>
</section>
</div>

<script>

	$("#form_discount,#form_discounted_price,#form_price").change(function () {
		var form_discounted_price = $('#form_discounted_price').val();
		var form_price = $('#form_price').val();
		var form_discount =  $('#form_discount');

		var cal1 = form_price - form_discounted_price;
		var cal2 = (cal1 / form_price);
		var discount = cal2 * 100;
		form_discount.val(Math.round(discount));

	});

	var customize_array = [];
	var food_array = [];

	$('#add_customize').click(function(){

		var customize_id = $('#customize_id').val();

		postParam = {

			customize_id: customize_id
		};


		$.ajax({
			url:'<?=base_url()?>Ajax/addCustomize',
			type: "POST",
			data: postParam,
			success:function(data)
			{
				var data = JSON.parse(data);
				var customize = data.data;
				console.log(customize);

				var html = '<tr id="tr_' + customize.customize_id + '">';
					html += '<td>' + customize.customize + '</td>';
					html += '<td><button type="button" class="btn btn-danger pull-right" onclick="removeCustomize(' + customize.customize_id + ')">Remove</button></td>';
					html += '</tr>';

				customize_array.push({ customize_id: customize.customize_id });

				console.log(customize_array);
				
				$("#customize_list").append(html);

			}, 
			error: function () {
				console.log("error");
			}
		});
	});

	$('#add_food').click(function(){

		var food_id = $('#food_id').val();

		postParam = {

			food_id: food_id
		};


		$.ajax({
			url:'<?=base_url()?>Ajax/addFood',
			type: "POST",
			data: postParam,
			success:function(data)
			{
				var data = JSON.parse(data);
				var food = data.data;
				console.log(food);

				var html = '<tr id="tr_' + food.food_id + '">';
					html += '<td>' + food.food + '</td>';
					html += '<td><button type="button" class="btn btn-danger pull-right" onclick="removeFood(' + food.food_id + ')">Remove</button></td>';
					html += '</tr>';

				food_array.push({ food_id: food.food_id });

				console.log(food_array);
				
				$("#food_list").append(html);

			}, 
			error: function () {
				console.log("error");
			}
		});
	});

	function removeCustomize(customize_id){

		$('#tr_' + customize_id).closest('tr').remove();

		var index = customize_array.map(function(e) { return e.customize_id; }).indexOf(customize_id.toString());

		if(index != -1){

			customize_array.splice(index, 1);
		}

		console.log(customize_array);
	}

	function removeFood(food_id){

		$('#tr_' + food_id).closest('tr').remove();

		var index = food_array.map(function(e) { return e.food_id; }).indexOf(food_id.toString());

		if(index != -1){

			food_array.splice(index, 1);
		}

		console.log(food_array);
	}

	$('#submit_food').click(function(e){

		var food_form = document.getElementById("food_form");

		e.preventDefault();
        food_form_submit(food_form);
	});

	function food_form_submit(form) {

		var data = new FormData(form);
		var url = '<?= base_url() ?>food/add';

		for(var i = 0; i < customize_array.length; i++){

			data.append('customize[]', customize_array[i].customize_id);
		}

		for(var i = 0; i < food_array.length; i++){

			data.append('food[]', food_array[i].food_id);
		}

		$.ajax({
			url: url,
			data: data,
			processData: false,
			contentType: false,
			type: "POST",
			success: function(response) {

				console.log(response);
				window.location.href = "<?= base_url()?>Food";
			}, 
			error: function () {
				console.log("error");
			}
		});
	}
</script>

<!-- <script>
    $("#submit_food").click(function(e){
 
        var file = $("#file").val();
        var food = $("#form_food").val();
        var description = $("#form_description").val();
        var price = $("#form_price").val();
		var discounted_price = $('#form_discounted_price').val();
        var discount = $("#form_discount").val();
        var food_list = {
            file : file,
            food : food,
            description : description,
            price : price,
			discounted_price : discounted_price,
            discount : discount,
            contentType : false,
            processData : false,
        };
        postParam = {
            food_list : food_list,
        }
        // console.log(postParam);
         $.post("<?= base_url()?>food/add/<?= $store_id ?>", postParam, function(response){
            window.location.replace("<?=base_url()?>store/details/<?= $store_id ?>" );
         });
    });
			
</script> -->
