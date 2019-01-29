<!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li>Dashboard</li>
            </ol>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->

<section class="content-header">
  <h1>
      Dashboard
  </h1>
  <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
  </ol>
</section>

<section class="content">

  <div class="row row-eq-height">
    <div class="col-12">
      <div class="col-md-4 col-xs-12 full_height left_divider">
        <div class="col-12">
          <div class="col-xs-4 no_padding no_margin text_center calendar_label">
            <button class="btn btn-info full_width">Homework</button>
          </div>
          <div class="col-xs-4 no_padding no_margin text_center calendar_label">
            <button class="btn btn-warning full_width">Assignment</button>
          </div>
          <div class="col-xs-4 no_padding no_margin text_center calendar_label">
            <button class="btn btn-success full_width">Events</button>
          </div>
        </div>
        <div id='calendar'></div>
        <div class="col-12">
          <h3>27/01/2019</h3>
          <button class="btn btn-info full_width text_left">Homework</button>
          <p class="no_padding no_margin">Science - Paper Practice, Section B (due Monday)</p>
          <p class="no_padding no_margin text-success">3A Homework</p>
          <p class="no_padding no_margin text-muted text_right">3A Homework</p>
        </div>
      </div>
      <div class="col-md-4 col-xs-12 full_height left_divider">
        <h3 class="no_padding no_margin display_inline">Announcement</h3>
        <a href='<?php echo site_url('dashboard/add_announcement') ?>'><button class="btn btn-success display_inline tiny_add_button"><i class="fa fa-plus"></i></button></a>
        <br>
        <?php foreach($announcement as $row){ ?>
        <br>
        <p><?= $row['announcement'] ?></p>
        <hr class="custom_hr dashed">
        <p>
          <?= nl2br($row['description']) ?>
        </p>
        <hr class="custom_hr">
        <?php } ?>
      </div>
      <div class="col-md-4 col-xs-12 full_height left_divider">
        <h3 class="no_padding no_margin display_inline">My Notifications</h3>
        <a href='<?php echo site_url('dashboard/add_notification') ?>'><button class="btn btn-success display_inline tiny_add_button"><i class="fa fa-plus"></i></button></a>
        <br>
        <br>
        <?php foreach($notification as $row){ ?>
        <div class="col-xs-12 bordered_block notification_block">
          <div class="row full_height">
            <div class="col-xs-3 no_padding no_margin text_center full_height">
              <img class="xs_thumbnail round_image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Husky_on_San_Francisco_sidewalk.jpg/220px-Husky_on_San_Francisco_sidewalk.jpg">
            </div>
            <div class="col-xs-6 no_padding no_margin full_height">
              <p class="no_margin no_padding"><?= $row['notification'] ?></p>
              <p class="no_margin no_padding"><?= nl2br($row['description']) ?></p>
            </div>
            <div class="col-xs-3 no_padding no_margin flex_center full_height">
              <small class="no_padding no_margin text-muted"><?= date("l", strtotime($row['created_date'])) ?></small>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- <div class="col-xs-12 bordered_block notification_block">
          <div class="row full_height">
            <div class="col-xs-3 no_padding no_margin text_center full_height">
              <img class="xs_thumbnail round_image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Husky_on_San_Francisco_sidewalk.jpg/220px-Husky_on_San_Francisco_sidewalk.jpg">
            </div>
            <div class="col-xs-6 no_padding no_margin full_height">
              <p class="no_margin no_padding">System Notification</p>
              <p class="no_margin no_padding">image</p>
            </div>
            <div class="col-xs-3 no_padding no_margin flex_center full_height">
              <small class="no_padding no_margin text-muted">FRIDAY</small>
            </div>
          </div>
        </div> -->
        <div class="col-xs-12 bordered_block notification_block">
          <div class="row full_height">
            <div class="col-xs-9 no_padding no_margin text_center full_height flex_center">
              <input type="text" class="form-control search_form" placeholder="search...">
            </div>
            <div class="col-xs-3 no_padding no_margin flex_center full_height">
              <button class="search_form_btn"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>