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
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Food</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" class="input_form" id="food_form" method="POST" action="<?= base_url()?>food/edit/<?= $food['food_id'] ?>" enctype="multipart/form-data">
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
						<img class="img-thumbnail" src="<?= base_url() . $food['image'] ?>" style="width:30%; height:20%;">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control" name="file" required>
					</div>

					<?= $input_field['food'] ?>
					<?= $input_field['food_category_id'] ?>
					<?= $input_field['description'] ?>
					<?= $input_field['price'] ?>
					<?= $input_field['discounted_price'] ?>
					<?= $input_field['discount'] ?>
					<?= $input_field['store_id'] ?>

					<!-- <div class="form-group">
						<label>Food Category</label>
						<select class="form-control" required name="food_category_id" id="form_food_category_id">
							<option value="none">None</option>
							<?php foreach ($food_category as $row) { ?>
								<option value="<?= $row['food_category_id'] ?>" <?php if($row['food_category_id'] == $food['food_category_id']){ ?> selected <?php } ?>><?= $row['food_category'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Food</label>
						<input type="text" class="form-control" name="food" required value="<?= $food['food'] ?>">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea type="text" class="form-control" name="description" rows="4" required><?= $food['description'] ?></textarea>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control" name="price" id="form_price" required value="<?= $food['price'] ?>">
					</div>
					<div class="form-group">
						<label>Discounted Price</label>
						<input type="text" class="form-control" name="discounted_price" id="form_discounted_price" required value="<?= $food['discounted_price'] ?>">
					</div>
					<div class="form-group">
						<label>Discount (%)</label>
						<input type="text" class="form-control" name="discount" id="form_discount" required value="<?= $food['discount'] ?>">
					</div>
					<div class="form-group">
						<label>Store</label>
						<select class="form-control" required name="store_id" id="form_store_id">
							<option value="none">None</option>
							<?php foreach ($store as $row) { ?>
								<option value="<?= $row['store_id'] ?>" <?php if($row['store_id'] == $food['store_id']){ ?> selected <?php } ?>><?= $row['store'] ?></option>
							<?php } ?>
						</select>
					</div> -->
				</div>
				<!-- /.box-body -->

				<!-- <div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div> -->
			</form>
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

	$(document).ready(function(){

		<?php foreach($customize_list as $row){ ?>
			
			addCustomize(<?= $row['customize_id'] ?>);

		<?php } ?>
	});

	$('#add_customize').click(function(){

		var customize_id = $('#customize_id').val();

		addCustomize(customize_id);

	});

	function addCustomize(customize_id){

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
	}

	function removeCustomize(customize_id){

		$('#tr_' + customize_id).closest('tr').remove();

		var index = customize_array.map(function(e) { return e.customize_id; }).indexOf(customize_id.toString());

		if(index != -1){

			customize_array.splice(index, 1);
		}

		console.log(customize_array);
	}

	$('#submit_food').click(function(e){

		var food_form = document.getElementById("food_form");

		e.preventDefault();
		food_form_submit(food_form);
	});

	function food_form_submit(form) {

		var data = new FormData(form);
		var url = '<?= base_url() ?>food/edit/<?= $food['food_id'] ?>';

		for(var i = 0; i < customize_array.length; i++){

			data.append('customize[]', customize_array[i].customize_id);
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