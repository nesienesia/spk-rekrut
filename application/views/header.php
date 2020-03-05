<?php
//$cek    = $user->result();
//$nama   = $cek[0]->username;
//$level  = $cek[0]->level;
//$dept  = $cek[0]->dept;

$ceks = $this->session->userdata('kamar@2017');
$ceks = $this->Mcrud->get_data_by_pk('tbl_user', 'username', $ceks)->row();

//var_dump($this->session->userdata());exit;

$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));

?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="<?php echo base_url(); ?>" />

	<title><?php echo ucwords($ceks->level); ?> | <?php echo ucwords($ceks->username); ?></title>

	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<?php
	if ($sub_menu == "" or $sub_menu == "profile" or $sub_menu == "feedback" or $sub_menu == "info") { ?>
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
		<script type="text/javascript" src="assets/js/core/app.js"></script>

	<?php
	} ?>

	<?php
	if (
		$sub_menu == "karyawan" or $sub_menu == "karyawan_edit" 
		or $sub_menu == "permintaan_tk" or $sub_menu == "permintaan_tk_edit" 
		or $sub_menu == "penilaian" or $sub_menu == "penilaian_edit" 
		or $sub_menu == "kriteria" or $sub_menu == "kriteria_edit"
		or $sub_menu == "sub_kriteria" or $sub_menu == "sub_kriteria_edit"
		or $sub_menu == "nilai_profil_karyawan" or $sub_menu == "nilai_profil_karyawan_edit"
		or $sub_menu == "user" or $sub_menu == "user_edit" 
	) { ?>
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
		<script type="text/javascript" src="assets/js/core/app.js"></script>
		<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
		<!-- /theme JS files -->
	<?php
	} ?>


</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default navbar-fixed-top header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href=""><img src="assets/images/iconfscm.jpg" alt=""></a>
			<!--<p style="color:white;font-size:12px;padding:15px;">Aplikasi HRD</p>-->


			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="foto/iconfscm.jpg" alt="">
						<span><?php echo ucwords($ceks->username); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="web/profile"><i class="icon-user"></i> Profile</a></li>
						<li class="divider"></li>
						<li><a href="web/feedback"><i class="icon-mail5"></i> Feedback</a></li>
						<li class="divider"></li>
						<li><a href="web/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="" class="media-left"><img src="foto/icon.png" class="img-circle img-lg" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo ucwords($ceks->username); ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-users text-size-small"></i> &nbsp;<?php echo $ceks->level; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if ($sub_menu == "") {
												echo 'active';
											} ?>"><a href="web"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

								
								<li class="<?php if (
												 $sub_menu == "permintaan_tk" or $sub_menu == "permintaan_tk_edit" 
											) {
												echo 'active';
											} ?>">
									<a href="#"><i class="icon-portfolio"></i> <span>Permintaan Tenaga Kerja</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "permintaan_tk" or $sub_menu == "permintaan_tk_edit") {
														echo 'active';
													} ?>"><a href="web/permintaan_tk">Form Permintaan Tenaga Kerja</a></li>
										<?php
										if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
											
											<li class="<?php if ($sub_menu == "realisasiptk" or $sub_menu == "realisasiptk_edit") {
															echo 'active';
														} ?>"><a href="web/realisasiptk">Realisasi</a></li>
										<?php
										}  ?>
									</ul>
								</li>

								<?php
										if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
								<li class="<?php if (
												 $sub_menu == "penilaian" or $sub_menu == "penilaian_edit" 
											) {
												echo 'active';
											} ?>">
									<a href="#"><i class="icon-portfolio"></i> <span>Penilaian Karyawan</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "penilaian" or $sub_menu == "penilaian_edit") {
														echo 'active';
													} ?>"><a href="web/penilaian">Form Penilaian Karyawan</a></li>
									</ul>
								</li>

								<li class="<?php if (
												 $sub_menu == "kriteria" or $sub_menu == "kriteria_edit" 
												 or $sub_menu == "sub_kriteria" or $sub_menu == "sub_kriteria_edit"
												 or $sub_menu == "nilai_profil_karyawan" or $sub_menu == "nilai_profil_karyawan_edit"
												 or $sub_menu == "profile_matching"
											) {
												echo 'active';
											} ?>">
									<a href="#"><i class="icon-portfolio"></i> <span>Profile Matching</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "kriteria" or $sub_menu == "kriteria_edit") {
														echo 'active';
													} ?>"><a href="web/kriteria">Kriteria</a></li>
									
								<li class="<?php if ($sub_menu == "sub_kriteria" or $sub_menu == "sub_kriteria_edit") {
														echo 'active';
													} ?>"><a href="web/sub_kriteria">Sub Kriteria</a></li>
									
								<li class="<?php if ($sub_menu == "nilai_profil_karyawan" or $sub_menu == "nilai_profil_karyawan_edit") {
														echo 'active';
													} ?>"><a href="web/nilai_profil_karyawan">Nilai Profil Karyawan</a></li>
									
								</li>
								<li class="<?php if ($sub_menu == "profile_matching") {
														echo 'active';
													} ?>"><a href="Profile_matching/index">Analisa</a></li>
									
								</li>
								</ul>
								<?php
										}  ?>

								

								<li class="<?php if ($sub_menu == "laporan" or $sub_menu == "laporanpermintaan" or $sub_menu == "laporanevaluasi" or $sub_menu == "laporanpenugasan" or $sub_menu == "laporanpenugasan_sementara") {
												echo 'active';
											} ?>">
									<a href="#"><i class="icon-file-stats"></i> <span>Data</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "karyawan" or $sub_menu == "karyawan_edit") {
														echo 'active';
													} ?>"><a href="web/karyawan">Karyawan</a></li>
										<li class="<?php if ($sub_menu == "laporanpermintaan") {
														echo 'active';
													} ?>"><a href="web/laporanpermintaan">Permintan Tenaga Kerja</a></li>
										<?php
										if ($ceks->level == "admin" || $ceks->level == "hrd") { ?>
											<li class="<?php if ($sub_menu == "user" or $sub_menu == "user_edit") {
															echo 'active';
														} ?>"><a href="web/user">User</a></li>
										<?php
										}  ?>
									</ul>
								</li>


								<!-- /main -->

								<!-- Logout -->
								<!--<li class="navigation-header"><span>Logout</span> <i class="icon-menu" title=""></i></li>
								<li><a href="web/logout"><i class="icon-switch2"></i> <span>Logout </span></a></li>
-->
								<!-- /logout -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->