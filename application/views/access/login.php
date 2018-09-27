<form method="POST" action="<?= base_url()?>access/login">
    
	<div class='loginBox '>
		<div class="login-heading">
			<p>Login</p>
		</div>
		<div class='panel-body'>
        <img src="<?= site_url(); ?>/images/logo.png" class="logo_image">
			<form method="post">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<?php if (isset($error))    { ?>
							<div class="alert alert-danger alert-dismissable">
								<?= $error; ?>
							</div>
							<?php 
                        } ?>
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<label>Username
								<label>
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<input name='username' type="text" class="form-control" placeholder='username' />
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							
						
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<label>Password
								<label>
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<input name='password' type="password" placeholder='password' class="form-control" />
						</div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 button-container">

                        <br>
				<input type="submit" value="login" class="btn btn-primary">
			</div>
					</div>
				</div>
			</form>
		</div>
		
	</div>
</form>
