<div class="content-container" style="display: flow-root;">
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
                    <?= $input_fields['name_on_card'] ?>
                    <?= $input_fields['card_number'] ?>
                    <?= $input_fields['postal_code'] ?>
                    <?= $input_fields['cvv'] ?>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
</div>



