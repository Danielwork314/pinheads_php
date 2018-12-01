<section class="content-header">
    <h1>
    Store Category
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>store_category"><i class="fa fa-tags"></i> Store Category</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Store Category</h4>

            <a href='<?php echo site_url('store_category/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <!-- <th>Parent</th> -->
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$i = 1;
foreach ($store_category as $row) {
    ?>
                                    <tr>
                                        <td><a href="<?=base_url()?>store_category/details/<?=$row['store_category_id']?>"><?=$i?></a></td>
                                        <td><a href="<?=base_url()?>store_category/details/<?=$row['store_category_id']?>"><img src="<?=base_url() . $row['thumbnail']?>" class="xs_thumbnail"></a></td>
                                        <td><a href="<?=base_url()?>store_category/details/<?=$row['store_category_id']?>"><?=$row['store_category']?></a></td>
                                        <!-- <td><a href="<?=base_url()?>store_category/details/<?=$row['store_category_id']?>"><?=$row['parent']?></a></td> -->
                                        <td><a href="<?=base_url()?>store_category/delete/<?=$row['store_category_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
$i++;
}
?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <!-- <th>Parent</th> -->
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>