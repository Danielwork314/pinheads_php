<section class="content-header">
    <h1>
        Classrooms
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>classroom"><i class="fa fa-laptop"></i> classroom</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Classroom</h4>

            <a href='<?php echo site_url('classroom/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Classroom</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($classroom as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>classroom/details/<?= $row['classroom_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>classroom/details/<?= $row['classroom_id']?>"><?= $row['classroom'] ?></a></td>
                                        <td><a href="<?= base_url() ?>classroom/delete/<?= $row['classroom_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Classroom</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>