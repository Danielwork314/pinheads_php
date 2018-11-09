<section class="content-header">
    <h1>
        Vendors
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>vendor"><i class="fa fa-user"></i> Vendor</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Vendor</h4>

            <a href='<?php echo site_url('vendor/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Profile Picture</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($vendor as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>vendor/details/<?= $row['vendor_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>vendor/details/<?= $row['vendor_id']?>"><img src="<?= base_url() . $row['image'] ?>" class="xs_thumbnail"></a></td>
                                        <td><a href="<?= base_url() ?>vendor/details/<?= $row['vendor_id']?>"><?= $row['name'] ?></a></td>
                                        <td><a href="<?= base_url() ?>vendor/details/<?= $row['vendor_id']?>"><?= $row['contact'] ?></a></td>
                                        <td><a href="<?= base_url() ?>vendor/details/<?= $row['vendor_id']?>"><?= $row['email'] ?></a></td>
                                        <td><a href="<?= base_url() ?>vendor/details/<?= $row['vendor_id']?>"><?= $row['role'] ?></a></td>
                                        <td><a href="<?= base_url() ?>vendor/delete/<?= $row['vendor_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Profile Picture</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</section>