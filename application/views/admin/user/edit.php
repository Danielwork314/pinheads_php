<section class="content-header">
	<h1>
		Edit User
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>User">
				<i class="fa fa-user"></i> User</a>
		</li>
		<li>
			<a href="<?= base_url() ?>User/edit/<?= $user['user_id'] ?>"> Edit User</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">User</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<?php
			if(!empty($error)){
				?>
					<br/>
					<div class='alert alert-danger alert-dismissable' style="margin-left:10%;margin-right:10%;">
                        <?= $error; ?>
                    </div>
				<?php
			}
		?>
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>user/edit/<?= $user['user_id'] ?>">
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
                    <img class="img-thumbnail" src="<?= base_url() . $user['image'] ?>">
				</div>
				<div class="form-group">
					<label>Profile Picture</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<?= $input_field['username'] ?>
				<?= $input_field['name'] ?>
				<?= $input_field['gender'] ?>
				<div class="form-group">
                    <label>Birthday</label>
                    <input type="date" class="form-control" name="birthday" value="<?= $user['birthday'] ?>"" required>
                </div>
				<?= $input_field['email'] ?>
				<?= $input_field['contact'] ?>
				<?= $input_field['password'] ?>
				<?= $input_field['password2'] ?>
				<?= $input_field['role_id'] ?>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
