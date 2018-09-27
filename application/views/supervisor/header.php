<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Event Tracking</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>css/skins/_all-skins.min.css"> -->
	<link rel="stylesheet" href="<?= base_url() ?>css/skins/skin-purple.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?= base_url() ?>css/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?= base_url() ?>css/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= base_url() ?>css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>css/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?= base_url() ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

	<!-- Custom Admin CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>css/admin/admin.css">
	<link rel="stylesheet" href="<?= base_url() ?>css/util.css">
	<link rel="stylesheet" href="<?= base_url() ?>css/custom.css">


	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

	<script src="<?= base_url() ?>js/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url() ?>js/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?= base_url() ?>js/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-purple sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<b>E</b>
				</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">
					<b>Event</b> Tracking</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?= base_url()?>access/logout" class="btn">
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
                    <li class="header"><i class="fa fa-circle text-success" style="margin-right:2.5%; font-size:0.8em;"></i> <?= $this->session->userdata("login_data")["username"]?></li>
					<li class=" <?php  if ($this->router->fetch_class() == 'dashboard'){ echo 'active' ;} ?> ">
						<a href="<?= base_url() ?>dashboard">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<?php
                            if($this->session->userdata("role_access")["admin"]["read_control"] == 1){
                                ?>
						<li class=" <?php  if ($this->router->fetch_class() == 'admin'){ echo 'active' ;} ?> ">
							<a href="<?= base_url() ?>admin">
								<i class="fa fa-user-secret"></i>
								<span>Admin</span>
							</a>
						</li>
						<?php
                            }
                        ?>
							<?php
                            if($this->session->userdata("role_access")["user"]["read_control"] == 1){
                                ?>
								<li class=" <?php  if ($this->router->fetch_class() == 'user'){ echo 'active' ;} ?> ">
									<a href="<?= base_url() ?>user">
										<i class="fa fa-user"></i>
										<span>User</span>
									</a>
								</li>
								<?php
                            }
                        ?>
									<?php
                            if($this->session->userdata("role_access")["client"]["read_control"] == 1){
                                ?>
										<li class=" <?php  if ($this->router->fetch_class() == 'client'){ echo 'active' ;} ?> ">
											<a href="<?= base_url() ?>client">
												<i class="fa fa-users"></i>
												<span>Client</span>
											</a>
										</li>
										<?php
                            }
                        ?>
											<?php
                            if($this->session->userdata("role_access")["project"]["read_control"] == 1){
                                ?>
												<li class=" <?php  if ($this->router->fetch_class() == 'project'){ echo 'active' ;} ?> ">
													<a href="<?= base_url() ?>project">
														<i class="fa fa-calendar-o"></i>
														<span>Project</span>
													</a>
												</li>
												<?php
                            }
                        ?>
													<?php
                            if($this->session->userdata("role_access")["outlet"]["read_control"] == 1){
                                ?>
														<li class=" <?php  if ($this->router->fetch_class() == 'outlet'){ echo 'active' ;} ?> ">
															<a href="<?= base_url() ?>outlet">
																<i class="fa fa-building"></i>
																<span>Outlet</span>
															</a>
														</li>
														<?php
                            }
                        ?>
															<?php
                            if($this->session->userdata("role_access")["item"]["read_control"] == 1){
                                ?>
																<li class=" <?php  if ($this->router->fetch_class() == 'item'){ echo 'active' ;} ?> ">
																	<a href="<?= base_url() ?>item">
																		<i class="fa fa-shopping-cart"></i>
																		<span>Item</span>
																	</a>
																</li>
																<?php
                            }
                        ?>
																	<?php
                            if($this->session->userdata("role_access")["role_access"]["read_control"] == 1){
                                ?>
																		<li class=" <?php  if ($this->router->fetch_class() == 'role_access'){ echo 'active' ;} ?> ">
																			<a href="<?= base_url() ?>role_access">
																				<i class="fa fa-vcard"></i>
																				<span>Role Access Control</span>
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