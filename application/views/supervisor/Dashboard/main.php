<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Pending reports <span class="badge badge-danger"><?= $total_pending_reports ?></span></h4>
        </div>
        <div class='box-body no-padding'>
            <table class="table table-hover">
               <?php
                $temp_project_id = 0;
                $temp_project_outlet_id = 0;
                
                foreach($ongoing_projects as $project){
                    if (!count($project['pending_reports'])) continue;
                    
                    foreach($project['pending_reports'] as $project_outlet){ 
                        foreach($project_outlet['pending'] as $report){ ?>
                            <tr>
                                <!-- prints only when the project id is different -->
                                <?php if ($temp_project_id != $project['project_id']){ ?>
                                    <th rowspan="<?= $project['total_pending_reports']; ?>"><?= $project['name']; ?></th>
                                    <?php $temp_project_id = $project['project_id']; } ?>

                                <!-- prints only when the project_outlet id is different -->
                                <?php if ($temp_project_outlet_id != $project_outlet['outlet']['project_outlet_id']) { ?>
                                    <td rowspan="<?= count($project_outlet['pending']); ?>"><?= $project_outlet['outlet']['outlet']; ?></td>
                                <?php  $temp_project_outlet_id = $project_outlet['outlet']['project_outlet_id']; } ?>

                            
                                <td>
                                    <a href="<?= site_url('Project_report/add/'.$project['project_id']."/".$project_outlet['outlet']['project_outlet_id']."/".$report); ?>">
                                            Report Date : <?= $report ?>
                                    </a>
                                
                                </td>
                            </tr>
            <?php          
                            } 
                        } 
                    } ; ?>

            </table>
        </div>
    </div>
</section>