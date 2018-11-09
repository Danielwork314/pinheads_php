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
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="file" class="form-control" name="description" id="form_description" rows="5" required></textarea>
                    </div>
                    <?= $input_fields['price'] ?>
                    <?= $input_fields['discounted_price'] ?>
                    <div class="form-group">
                        <label>Discount (%)</label>
                        <input type="text" class="form-control" name="discount" id="form_discount" readonly>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" id="submit_menu" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
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
</script>




