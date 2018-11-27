<section class="content-header">
	<h1>
		Add Order
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>order">
				<i class="fas fa-tasks"></i> Order</a>
		</li>
		<li>
			<a href="<?= base_url() ?>order/add"> Add order</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
    <div class="col-md-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Order Details</h3>
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

                <div class="form-group">
                    <label>User</label>
                    <select class="form-control" required name="user_id" id="user_sel">
                        <?php foreach($user as $row){ ?>
                            <option value="<?= $row['user_id']?>"><?= $row['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- <?= $input_field['payment_id'] ?>
                <?= $input_field['billing_address_id'] ?>
                <?= $input_field['store_id'] ?> -->
                
                <div class="form-group">
                    <label>Payment</label>
                    <div class="form_payment">
                    <select class="form-control" required name="payment_id" id="payment_sel">
                        <?php foreach($user as $row){ ?>
                            <option value="<?= $row['user_id']?>"><?= $row['name'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Billing Address</label>
                    <div class="form_billing_address">
                    <select class="form-control" required name="billing_address_id" id="billing_address_sel">
                        <?php foreach($user as $row){ ?>
                            <option value="<?= $row['user_id']?>"><?= $row['name'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Store</label>
                    <select class="form-control" required name="store_id" id="store_sel">
                        <?php foreach($store as $row){ ?>
                            <option value="<?= $row['store_id']?>"><?= $row['store'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Take Away</label>
                    <select class="form-control" required name="take_away" id="take_away">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Total Price</label>
                    <input type="number" class="form-control" name="total_price" id="total_price" disabled>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="button" id="submit_order" class="btn btn-primary pull-right">Submit</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Order Foods</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label>Menu</label>
                        <div class="form_food">
                        <select class="form-control" required name="food_id">
                            <?php foreach ($food as $row) { ?>
                                <option value="<?= $row['food_id'] ?>"><?= $row['food'] ?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                
                    <div class="col-md-2" style="padding-top: 24px;">
                        <button type="button" id="confirm_food" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </div>

                <div class="form-group">
                    <table id="" class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th width="40%">Food On Lists</th>
                                <th width="40%"></th>
                            </tr>
                        </thead>
                        <tbody id="food_list"></tbody>
                    </table>
                </div>
            </div>     
        </div>
    </div>
</section>

<script>

    var food_array = [];

    $(document).ready(function(){

        changeStore();
        changePayment();
        changeBillingAddress();
    });

    $('#confirm_food').click(function(){

        var food_id = $('#food_id').val();

        postParam = {

            food_id: food_id
        };

        $.ajax({
            url:'<?=base_url()?>Ajax/addOrderFood',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                var data = JSON.parse(data);
                var food = data.data;
                console.log(food);

                var html = '<tr id="tr_' + food.food_id + '">';
                    html += '<td>' + food.food + '</td>';
                    html += '<td><button type="button" class="btn btn-danger" onclick="removeFood(' + food.food_id + ')">Remove</button></td>';
                    html += '</tr>';

                food_array.push({ food_id: food.food_id, price: food.price });

                console.log(food_array);
                
                $("#food_list").append(html);

                var total_price = 0;

                for(var i = 0; i < food_array.length; i++){

                    total_price += parseFloat(food_array[i].price);
                    console.log(total_price);

                    $('#total_price').val(total_price.toFixed(2));
                }
            }, 
            error: function () {
                console.log("error");
            }
        });
    });

    $('#submit_order').click(function(){

        var user_id = $('#user_sel').val();
        var store_id = $('#store_sel').val();
        var billing_address_id = $('#billing_address_id').val();
        var payment_id = $('#payment_id').val();
        var take_away = $('#take_away').val();
        var total_price = $('#total_price').val();

        if(food_array.length <= 0 ){

            alert('Please order at least one food');
            return false;
        }

        postParam = {
            user_id: user_id,
            store_id: store_id,
            billing_address_id: billing_address_id,
            payment_id: payment_id,
            take_away: take_away,
            total_price: total_price,
            food_array: food_array,
        };

        console.log(postParam);

        $.ajax({
            url:'<?=base_url()?>Order/add',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                console.log(data);
                window.location = "<?= base_url() ?>Order/";
            }, 
            error: function () {
                console.log("error");
            }
        });
    });

    $('#store_sel').change(function(){

        changeStore();
    });

    $('#user_sel').change(function(){

        changePayment();
        changeBillingAddress();
    });

    function changeStore(){

        var store_id = $('#store_sel').val();
        
        postParam = {
            store_id: store_id
        };

        $.ajax({
            url:'<?=base_url()?>Ajax/getStoreMenu',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                $('.form_food').html(data);   
            }, 
            error: function () {
                console.log("error");
            }
        });
    }   

    function changePayment(){

        var user_id = $('#user_sel').val();

        postParam = {
            user_id: user_id
        };

        $.ajax({
            url:'<?=base_url()?>Ajax/getPayment',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                $('.form_payment').html(data);   
            }, 
            error: function () {
                console.log("error");
            }
        });
    }  

    function changeBillingAddress(){

        var user_id = $('#user_sel').val();

        postParam = {
            user_id: user_id
        };

        $.ajax({
            url:'<?=base_url()?>Ajax/getBillingAddress',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                $('.form_billing_address').html(data);   
            }, 
            error: function () {
                console.log("error");
            }
        });
    }  


    function removeFood(food_id){

        $('#tr_' + food_id).closest('tr').remove();

        var index = food_array.map(function(e) { return e.food_id; }).indexOf(food_id.toString());

        if(index != -1){

            food_array.splice(index, 1);
        }

        console.log(food_array);
    }
</script>