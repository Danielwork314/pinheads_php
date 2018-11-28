<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		Add Card
	</h1>
	<ol class="breadcrumb">
        <li>
			<a href="<?= base_url() ?>User">
				<i class="fa fa-users"></i> User</a>
		</li>
		<li>
			<a href="<?= base_url() ?>User/details/<?= $user['user_id'] ?>">
				<?= $user['username'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>card/add/<?= $user_id ?>"> Add card</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
    <div class="col-md-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Card</h3>
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
                    
                    <?= $input_field['card'] ?>
                    <?= $input_field['bank'] ?>
                    <?= $input_field['card_type_id'] ?>
                    <?= $input_field['cvv'] ?>
                    <?= $input_field['month'] ?>
                    <?= $input_field['year'] ?>
                    <?= $input_field['firstname'] ?>
                    <?= $input_field['lastname'] ?>
                    <?= $input_field['address'] ?>
                    <?= $input_field['region'] ?>
                    <?= $input_field['phone'] ?>
                    <?= $input_field['email'] ?>
                    
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



