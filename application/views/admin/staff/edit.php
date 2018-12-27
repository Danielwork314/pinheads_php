<section class="content-header">
	<h1>
		Edit staff
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Staff">
				<i class="fa fa-store-alt"></i> Staff</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Staff/edit/<?= $staff['staff_id'] ?>"> Edit staff</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Staff</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url() ?>staff/edit/<?= $staff['staff_id']?>">
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
				<?= $this->form->generate_input(array(
					"name" => "username",
					"required" => true,
					"value" => $staff['username']
				)) ?>
				<?= $this->form->generate_input(array(
					"name" => "password",
					"type" => "password",
					"small" => "*leave this empty to keep old password",
				)) ?>
				<?= $this->form->generate_input(array(
					"name" => "password2",
					"label" => "Confirm Password",
					"type" => "password",
					"small" => "*leave this empty to keep old password",
				)) ?>
				<?= $this->form->generate_input(array(
					"name" => "name",
					"required" => true,
					"value" => $staff['name']
				)) ?>
				<?= $this->form->generate_select(array(
					"label" => "Role",
					"name" => "role_id",
					"required" => true,
					"selected" => $staff['role_id']
				), array(
					"options" => $role,
					"value" => "role_id",
					"text" => "role"
				)) ?>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
