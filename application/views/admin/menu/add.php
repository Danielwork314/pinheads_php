<section class="content-header">
	<h1>
		Add Menu
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Menu">
				<i class="fa fa-utensils"></i> Menu</a>
		</li>
		<li>
			<a href="<?= base_url() ?>menu/add"> Add menu</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
    <div class="col-md-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="input_form" method="POST" enctype="multipart/form-data" id="menu_form">
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
                    
                    <?= $input_fields['menu'] ?>
                    <?= $input_fields['description'] ?>
                    <?= $input_fields['price'] ?>
                    <?= $input_fields['discount'] ?>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="button" id="submit_menu" class="btn btn-primary pull-right">Submit</button>
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

        $.post("<?= base_url() ?>Menu/add_ingredient", postParam, function(response){
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

    $("#submit_menu").click(function(e){

        // var fd = new FormData();
        // var files = $('#file')[0].files[0];
        // fd.append('file',files);
 
        var file = $("#file").val();
        var menu = $("#form_menu").val();
        var description = $("#form_description").val();
        var price = $("#form_price").val();
        var discount = $("#form_discount").val();

        var menu_list = {
            file : file,
            menu : menu,
            description : description,
            price : price,
            discount : discount,
            ingredient_id: ingredient_array,
            contentType : false,
            processData : false,
        };

        postParam = {
            menu_list : menu_list,
        }

        // console.log(postParam);

         $.post("<?= base_url()?>menu/add/<?= $store_id ?>", postParam, function(response){
            // redirect("store/details/" . $store_id['store_id'], "refresh");
            window.location.replace("<?=base_url()?>store/details/<?= $store_id ?>" );
         });
    });
			
</script>


