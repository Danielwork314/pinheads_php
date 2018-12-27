<section class="content-header">
	<h1>
		Add staff
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Staff">
				<i class="fa fa-store-alt"></i> Staff</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Staff/add"> Add staff</a>
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
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>staff/add">
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
				)) ?>
				<?= $this->form->generate_input(array(
					"name" => "password",
					"type" => "password",
					"required" => true,
				)) ?>
				<?= $this->form->generate_input(array(
					"name" => "password2",
					"label" => "Confirm Password",
					"type" => "password",
					"required" => true,
				)) ?>
				<?= $this->form->generate_input(array(
					"name" => "name",
					"required" => true,
				)) ?>
				<?= $this->form->generate_select(array(
					"label" => "Role",
					"name" => "role_id",
					"required" => true
				), array(
					"options" => $role,
					"value" => "role_id",
					"text" => "role"
				)) ?>
				<?= $this->form->generate_select(array(
					"label" => "Store",
					"name" => "store_id",
					"required" => true
				), array(
					"options" => $store,
					"value" => "store_id",
					"text" => "store"
				)) ?>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
