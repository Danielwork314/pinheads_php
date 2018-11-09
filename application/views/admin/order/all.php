<section class="content-header">
    <h1>
        Orders
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>order"><i class="fa fa-tasks"></i> Order</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Order</h4>

            <a href='<?php echo site_url('order/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Store</th>
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
                                        <td><a href="<?= base_url() ?>order/details/<?= $row['user_order_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>order/details/<?= $row['user_order_id']?>"><?= $row['name'] ?></a></td>
                                        <td><a href="<?= base_url() ?>order/details/<?= $row['user_order_id']?>"><?= $row['store'] ?></a></td>
                                        <td><a href="<?= base_url() ?>order/details/<?= $row['user_order_id']?>"><?= $row['created_date'] ?></a></td>
                                        <td><a href="<?= base_url() ?>order/delete/<?= $row['user_order_id']?>" class="btn btn-danger delete-button">Delete</a></td>
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