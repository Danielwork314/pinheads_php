<section class="content-header">
    <h1>
        Grades
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>grade"><i class="fa fa-graduation-cap"></i> grades</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Grade</h4>

            <a href='<?php echo site_url('grade/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Grade</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($grade as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>grade/details/<?= $row['grade_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>grade/details/<?= $row['grade_id']?>"><?= $row['grade'] ?></a></td>
                                        <td><a href="<?= base_url() ?>grade/delete/<?= $row['grade_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Grade</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>