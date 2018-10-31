<section class="content-header">
	<h1>
		Add Payment
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Payment">
				<i class="fa fa-utensils"></i> Payment</a>
		</li>
		<li>
			<a href="<?= base_url() ?>payment/add"> Add payment</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
    <div class="col-md-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Payment</h3>
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
                        <label>Card No</label>
                        <input type="text" class="form-control" name="card_no" required placeholder="Card No">
                    </div>
                    <div class="form-group">
                        <label>Bank</label>
                        <input type="text" class="form-control" name="bank" required placeholder="Bank">
                    </div>
                    <div class="form-group">
                        <label>Card Type</label>
                        <input type="text" class="form-control" name="card_type" required placeholder="Card Type">
                    </div>
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="text" class="form-control" name="cvv" required placeholder="CVV">
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <input type="text" class="form-control" name="month" required placeholder="Month">
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year" required placeholder="Year">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" required placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" required placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" required placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label>Region</label>
                        <input type="text" class="form-control" name="region" required placeholder="Region">
                    </div>
                    <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" class="form-control" name="phone" required placeholder="Phone No">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                    </div>
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>



