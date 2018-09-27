<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Ongoing Projects</h4>
        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>PIC</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($ongoing_projects as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>project/details/<?= $row['project_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>project/details/<?= $row['project_id']?>"><?= $row['name'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/details/<?= $row['project_id']?>"><?= $row['pic'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/details/<?= $row['project_id']?>"><?= $row['start_date'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/details/<?= $row['project_id']?>"><?= $row['end_date'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/details/<?= $row['project_id']?>"><?= $row['created_date'] ?></a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>PIC</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>