<section class="content-header">
    <h1>
        Role Access Controls
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>role_access"><i class="fa fa-id-card"></i> Role Access Control</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Role Access Control</h4>
        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Role</th>
                            <th>Module</th>
                            <th>Read</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($role_access as $row) {
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row["role"] ?></td>
                                    <td><?= $row["module"] ?></td>
                                    <td><?= ($row["read_control"] == 1) ? "YES" : "NO" ?></td>
                                    <td><?= ($row["create_control"] == 1) ? "YES" : "NO" ?></td>
                                    <td><?= ($row["update_control"] == 1) ? "YES" : "NO" ?></td>
                                    <td><?= ($row["delete_control"] == 1) ? "YES" : "NO" ?></td>
                                    <td><button type="button" class="btn btn-warning pull-right edit_role_access_btn" data-id="<?= $row["role_access_id"]?>"><i class="fa fa-edit"></i> edit</button></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Role</th>
                            <th>Module</th>
                            <th>Read</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div id="edit_role_access_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Role access</h4>
            </div>
            <div id="modal_refresh_box">
                <form method="POST" action="<?= base_url() ?>role_access/edit">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Module</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="read_control">
                                    <label class="form-check-label">
                                        Read
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="create_control">
                                    <label class="form-check-label">
                                        Create
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="update_control">
                                    <label class="form-check-label">
                                        Update
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="delete_control">
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
            </div>
        </div>

    </div>
</div>
<script>
    $(document).on("click", ".edit_role_access_btn", function(e){
        var role_access_id = $(this).data("id");

        postParam = {
            role_access_id: role_access_id
        };

        $.post("<?= base_url()?>ajax/editRoleAccessContent", postParam, function(data){
            $("#modal_refresh_box").html(data);
            $("#edit_role_access_modal").modal("show");
        });
    });

    $(document).on("submit", "#update_role_access_form", function(e){
        e.preventDefault();
        var link = $(this).attr("action");
        var postParam = $(this).serializeArray();
        var search = $('.dataTables_filter input').val();

        $.post(link, postParam, function(data){
		    data = JSON.parse(data);
            redirect = data["redirect"];
            $.dialog({
                title: 'Role Access Control Updated',
                content: 'Role Access Control has been updated. Permission changes will be applied instantly.',
                backgroundDismiss: true
            });
            $("#edit_role_access_modal").modal("hide");
            if(redirect) {
                location.reload();
            } else {
                $("#refreshBox").load(location.href + " #data-table");
		        $(".data-table").DataTable().destroy();
                setTimeout(function() {
		            $(".data-table").DataTable({
                        "search": {"search": search}
                    });
                }, 500);
            }
        });
    }); 
</script>