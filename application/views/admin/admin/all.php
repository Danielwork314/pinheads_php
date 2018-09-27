<section class="content-header">
    <h1>
        Admins
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>admin"><i class="fa fa-user-secret"></i> Admin</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Admin</h4>

            <a href='<?php echo site_url('admin/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($admin as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>admin/details/<?= $row['admin_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>admin/details/<?= $row['admin_id']?>"><?= $row['username'] ?></a></td>
                                        <td><a href="<?= base_url() ?>admin/details/<?= $row['admin_id']?>"><?= $row['name'] ?></a></td>
                                        <td><a href="<?= base_url() ?>admin/details/<?= $row['admin_id']?>"><?= $row['role'] ?></a></td>
                                        <td><a href="<?= base_url() ?>admin/delete/<?= $row['admin_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>