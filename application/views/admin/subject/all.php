<section class="content-header">
    <h1>
        Subjects
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>subject"><i class="fa fa-book"></i> subjects</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Subject</h4>

            <a href='<?php echo site_url('subject/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Subject</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($subject as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>subject/details/<?= $row['subject_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>subject/details/<?= $row['subject_id']?>"><?= $row['subject'] ?></a></td>
                                        <td><a href="<?= base_url() ?>subject/delete/<?= $row['subject_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Subject</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>