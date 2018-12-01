<section class="content-header">
	<h1>
		Add User Order
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>user_order">
				<i class="fas fa-clipboard-list"></i> User Order</a>
		</li>
		<li>
			<a href="<?= base_url() ?>user_order/add"> Add user order</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
    <div class="col-md-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Order</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="input_form" method="POST" enctype="multipart/form-data">
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
                        <label>Take Away</label>
                        <select class="form-control" required name="take_away">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <?= $input_field['sub_total'] ?>
                    <?= $input_field['service_change'] ?>
                    <?= $input_field['total'] ?>
                    <?= $input_field['status'] ?>
                    <!-- <div class="form-group">
                        <label>Sub Total</label>
                        <input type="text" class="form-control" name="sub_total" required placeholder="Sub Total">
                    </div>
                    <div class="form-group">
                        <label>Service Change</label>
                        <input type="text" class="form-control" name="service_change" required placeholder="Service Change">
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" name="total" required placeholder="Total">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" required placeholder="Status">
                    </div> -->
                    
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>



