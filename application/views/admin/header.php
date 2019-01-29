<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pinheads</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url();?>css/bootstrap.min.css">
	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
	 crossorigin="anonymous">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
	<!-- <link rel="stylesheet" href="<?=base_url();?>css/skins/_all-skins.min.css"> -->
	<link rel="stylesheet" href="<?=base_url();?>css/skins/skin-black.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?=base_url();?>css/morris.css">
	<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> -->
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?=base_url();?>css/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?=base_url();?>css/bootstrap-datepicker.min.css">
	<!-- Time Picker -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?=base_url();?>css/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?=base_url();?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css">

	<!-- Custom Admin CSS -->
	<link rel="stylesheet" href="<?=base_url();?>css/admin/admin.css">
	<link rel="stylesheet" href="<?=base_url();?>css/step_bar.css">
	<link rel="stylesheet" href="<?=base_url();?>css/util.css">
	<link rel="stylesheet" href="<?=base_url();?>css/custom.css">

	<!-- include summernote css/js -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

	<!-- Select2 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

	<!-- Chart -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	<script src="<?=base_url();?>js/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?=base_url();?>js/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);

	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?=base_url();?>js/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-black sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<b>P</b>H
				</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">
					<b>Pin</b>Heads</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" id="toggle-sidebar" class="fa fa-bars" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?=base_url();?>access/logout" class="btn">
								<i class="fa fa-sign-out"></i>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">
						<i class="fa fa-circle text-success" style="margin-right:2.5%; font-size:0.8em;"></i>
						<?=$this->session->userdata('login_data')['username'];?>
					</li>
					<li class=" <?php if ($this->router->fetch_class() == 'dashboard') echo 'active'; ?> ">
						<a href="<?=base_url();?>dashboard">
							<i class="fa fa-tachometer-alt"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<?php
					if(!empty($this->session->userdata('role_access')['admin']) AND $this->session->userdata('role_access')['admin']['read_control'] == 1){
						?>
						<li class="treeview <?php if (strpos($this->router->fetch_class(), 'admin') !== false OR strpos($this->router->fetch_class(), 'teacher') !== false OR strpos($this->router->fetch_class(), 'parent') !== false OR strpos($this->router->fetch_class(), 'student') !== false) echo 'active menu-open'; ?>">
							<a href="#">
								<i class="fa fa-users"></i> <span>Users</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu" style="<?php if (strpos($this->router->fetch_class(), 'admin') !== false OR strpos($this->router->fetch_class(), 'teacher') !== false OR strpos($this->router->fetch_class(), 'parent') !== false OR strpos($this->router->fetch_class(), 'student') !== false) echo 'display: none;'; ?>">
								<?php
								if(!empty($this->session->userdata('role_access')['admin']) AND $this->session->userdata('role_access')['admin']['read_control'] == 1){
								?>
								<li class="<?php if ($this->router->fetch_class() == 'admin') echo 'active'; ?> ">
									<a href="<?=base_url()?>admin">
										<i class="fa fa-genderless"></i>
										<span>Admin</span>
									</a>
								</li>
								<?php
								}
								if(!empty($this->session->userdata('role_access')['teacher']) AND $this->session->userdata('role_access')['teacher']['read_control'] == 1){
								?>
								<li class="<?php if ($this->router->fetch_class() == 'teacher') echo 'active'; ?> ">
									<a href="<?=base_url()?>teacher">
										<i class="fa fa-genderless"></i>
										<span>Teacher</span>
									</a>
								</li>
								<?php
								}
								if(!empty($this->session->userdata('role_access')['parents']) AND $this->session->userdata('role_access')['parents']['read_control'] == 1){
								?>
								<li class="<?php if ($this->router->fetch_class() == 'parents') echo 'active'; ?> ">
									<a href="<?=base_url()?>parents">
										<i class="fa fa-genderless"></i>
										<span>Parent</span>
									</a>
								</li>
								<?php
								}
								if(!empty($this->session->userdata('role_access')['student']) AND $this->session->userdata('role_access')['student']['read_control'] == 1){
								?>
								<li class="<?php if ($this->router->fetch_class() == 'student') echo 'active'; ?> ">
									<a href="<?=base_url()?>student">
										<i class="fa fa-genderless"></i>
										<span>Student</span>
									</a>
								</li>
								<?php
								}
								?>
							</ul>
						</li>
					<?php
					}
					if(!empty($this->session->userdata('role_access')['grade']) AND $this->session->userdata('role_access')['grade']['read_control'] == 1){
						?>
					<li class=" <?php if ($this->router->fetch_class() == 'grade') echo 'active'; ?> ">
						<a href="<?=base_url();?>grade">
							<i class="fa fa-graduation-cap"></i>
							<span>Grade</span>
						</a>
					</li>
					<?php
					}
					if(!empty($this->session->userdata('role_access')['classroom']) AND $this->session->userdata('role_access')['classroom']['read_control'] == 1){
						?>
					<li class=" <?php if ($this->router->fetch_class() == 'classroom') echo 'active'; ?> ">
						<a href="<?=base_url();?>classroom">
							<i class="fa fa-laptop"></i>
							<span>Classroom</span>
						</a>
					</li>
					<?php
					}
					if(!empty($this->session->userdata('role_access')['subject']) AND $this->session->userdata('role_access')['subject']['read_control'] == 1){
						?>
					<li class=" <?php if ($this->router->fetch_class() == 'subject') echo 'active'; ?> ">
						<a href="<?=base_url();?>subject">
							<i class="fa fa-book"></i>
							<span>Subject</span>
						</a>
					</li>
					<?php
					}
					if(!empty($this->session->userdata('role_access')['role_access']) AND $this->session->userdata('role_access')['role_access']['read_control'] == 1){
						?>
					<li class=" <?php if ($this->router->fetch_class() == 'role_access') echo 'active'; ?> ">
						<a href="<?=base_url();?>role_access">
							<i class="fa fa-address-card"></i>
							<span>Role Access</span>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="row">
				<div class="col-xs-12">
