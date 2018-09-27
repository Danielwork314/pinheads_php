<section class="content-header">
	<h1>
		Add admin
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Admin">
				<i class="fa fa-users"></i> Admin</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Admin/add"> Add admin</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Admin</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" action="<?= base_url()?>admin/add">
			<div class="box-body">
				<div class="form-group">
					<label for="adminUsername">Username</label>
					<input type="text" class="form-control" id="adminUsername" placeholder="Username" name="username" required>
				</div>
				<div class="form-group">
					<label for="adminName">Name</label>
					<input type="text" class="form-control" id="adminName" placeholder="Name" name="name" required>
				</div>
				<div class="form-group">
					<label for="adminPassword">Password</label>
					<input type="password" class="form-control" id="adminPassword" placeholder="Password" name="password" required>
				</div>
				<div class="form-group">
					<label for="adminPasswordRetype">Confirm Password</label>
					<input type="password" class="form-control" id="adminPasswordRetype" placeholder="Confirm Password" name="password2" required>
				</div>
				<div class="form-group">
					<label>Role</label>
					<select class="form-control" name="role_id">
						<?php
                        foreach($role as $row){
                            ?>
							<option value="<?= $row['role_id']?>">
								<?= $row['role']?>
							</option>
							<?php
                        }
                    ?>
					</select>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
