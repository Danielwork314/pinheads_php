<section class="content-header">
    <h1>
        Sales
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>sales"><i class="fa fa-tasks"></i> Sales</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Sales</h4>

            <!-- <a href='<?php echo site_url('sales/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a> -->

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Store</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($order as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>"><?= $row['name'] ?></a></td>
                                        <td><a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>"><?= $row['store'] ?></a></td>
                                        <td><a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>"><?=($row['status'] == 1) ? "Paid" : "Havn't Pay"?></a></td>
                                        <td><a href="<?= base_url() ?>sales/details/<?= $row['sales_id']?>"><?= $row['created_date'] ?></a></td>
                                        <td><a href="<?= base_url() ?>sales/delete/<?= $row['sales_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Store</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</section>