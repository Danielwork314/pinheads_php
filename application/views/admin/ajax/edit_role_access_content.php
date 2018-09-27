<form method="POST" action="<?= base_url() ?>role_access/edit/<?= $role_access['role_access_id'] ?>" id="update_role_access_form">
	<div class="modal-body">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<label><?= $role_access["role"] ?> > <?= $role_access["module"] ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="1" name="read_control" <?= ($role_access["read_control"] == 1) ? "checked" : "" ?>>
					<label class="form-check-label">
						Read
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="1" name="create_control" <?= ($role_access["create_control"] == 1) ? "checked" : "" ?>>
					<label class="form-check-label">
						Create
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="1" name="update_control" <?= ($role_access["update_control"] == 1) ? "checked" : "" ?>>
					<label class="form-check-label">
						Update
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="1" name="delete_control" <?= ($role_access["delete_control"] == 1) ? "checked" : "" ?>>
					<label class="form-check-label">
						Delete
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-primary" onclick="showLoader()">Submit</button>
	</div>
</form>