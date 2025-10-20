<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
	  $data_level = $_SESSION["ses_level"];
    }

    //KONE
	include "aksi.php";
	
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BMN</title>
	<link rel="icon" href="dist/img/LogoBPS.PNG">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script src="https://cdn.datatables.net/plug-ins/1.10.21/sorting/numeric-comma.js"></script>
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">
					
				<font color="white">
					<b>
						BADAN PUSAT STATISTIK
					</b>
				</font>
						
			</ul>

			
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/LogoBPS.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> BMN</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level=="Pengurus BMN"){
							$currentPage = isset($_GET['page']) ? $_GET['page'] : '';
						?>
					
						<li class="nav-item">
							<a href="?page=arsip-home" class="nav-link <?php echo ($currentPage == 'arsip-home') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-home"></i>
								<p>
									Home
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=arsip-dus" class="nav-link <?php echo ($currentPage == 'arsip-dus') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-box"></i>
								<p>
									Input Tiket Keluhan
								</p>
							</a>
						</li>

						<li class="nav-item">
						<a href="?page=arsip-sp2d" class="nav-link <?php echo ($currentPage == 'arsip-sp2d') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-folder-open"></i>
								<p>
									Lihat Tiket Keluhan
								</p>
							</a>
						</li>
						

						<li class="nav-item">
							<a href="?page=arsip-spm" class="nav-link <?php echo ($currentPage == 'arsip-spm') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-folder-open"></i>
								<p>
									Tes 3
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=arsip-drpp" class="nav-link <?php echo ($currentPage == 'arsip-drpp') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-folder-open"></i>
								<p>
									tes 4
								</p>
							</a>
						</li>
						
						<li class="nav-header" style="font-size: 1.0rem; font-weight: bold;">
							<i class="nav-icon fas fa-cog"></i><span style="padding-left: 10px;">Settings</span>
						</li>
						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link <?php echo ($currentPage == 'data-pengguna') ? 'active' : ''; ?>">
								<i class="nav-icon far fa-user"></i>
								<p>
									Kelola Akses
								</p>
							</a>
						</li>

						<?php
          				} elseif($data_level=="User"){
							$currentPage = isset($_GET['page']) ? $_GET['page'] : '';
          				?>

						
						<li class="nav-item">
							<a href="?page=arsip-home" class="nav-link <?php echo ($currentPage == 'arsip-home') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-home"></i>
								<p>
									Home
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=user-arsip-dus" class="nav-link <?php echo ($currentPage == 'user-arsip-dus') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-box"></i>
								<p>
									Arsip Dus
								</p>
							</a>
						</li>

						<li class="nav-item">
						<a href="?page=user-arsip-sp2d" class="nav-link <?php echo ($currentPage == 'user-arsip-sp2d') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-folder-open"></i>
								<p>
									Arsip SP2D
								</p>
							</a>
						</li>
						

						<li class="nav-item">
							<a href="?page=user-arsip-spm" class="nav-link <?php echo ($currentPage == 'user-arsip-spm') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-folder-open"></i>
								<p>
									Arsip SPM
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=user-arsip-drpp" class="nav-link <?php echo ($currentPage == 'user-arsip-drpp') ? 'active' : ''; ?>">
							<i class="nav-icon far fa fa-folder-open"></i>
								<p>
									Arsip DRPP
								</p>
							</a>
						</li>
						<li class="nav-header"></li>

						<?php
							}
						?>

						<li class="nav-item">
							<a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
								<i class="nav-icon fas fa-sign-out-alt text-danger"></i>
								<p>Logout</p>
							</a>
						</li>



				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->



		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
      if(isset($_GET['page'])){
          $hal = isset($_GET['page']) ? $_GET['page'] : '';
  #currentPage = isset($_GET['page']) ? $_GET['page'] : ''
          switch ($hal) {
            //Home
			 	case 'arsip-home':
				include "home/arsip_home/home.php";
				break;

			//DASHBOARD ADMIN DISINI =============================================================================//	  
				//Pengguna
				case 'data-pengguna':
					include "admin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "admin/pengguna/add_pengguna.php";
					break;
				case 'edit-pengguna':
					include "admin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "admin/pengguna/del_pengguna.php";
					break;
				
				//Admin home
				case 'arsip-home':
					include "home/arsip_home/home.php";
					break;

				//Admin Arsipsp2d
				case 'arsip-sp2d':
					include "admin/arsip_sp2d/data_arsip_sp2d.php";
					break;
				case 'add-sp2d':
					include "admin/arsip_sp2d/add_arsip.php";
					break;
				case 'edit-sp2d':
					include "admin/arsip_sp2d/edit_arsip.php";
					break;
				case 'del-sp2d':
					include "admin/arsip_sp2d/del_arsip.php";
					break;
				
				//Admin Arsipdus
				case 'arsip-dus':
					include "admin/arsip_dus/data_arsip_dus.php";
					break;
				case 'add-dus':
					include "admin/arsip_dus/add_arsip.php";
					break;
				case 'edit-dus':
					include "admin/arsip_dus/edit_arsip.php";
					break;
				case 'del-dus':
					include "admin/arsip_dus/del_arsip.php";
					break;

				//Admin Arsipspm
				case 'arsip-spm':
					include "admin/arsip_spm/data_arsip_spm.php";
					break;
				case 'add-spm':
					include "admin/arsip_spm/add_arsip.php";
					break;
				case 'edit-spm':
					include "admin/arsip_spm/edit_arsip.php";
					break;
				case 'del-spm':
					include "admin/arsip_spm/del_arsip.php";
					break;
	
				//Admin Arsipdrpp
				case 'arsip-drpp':
					include "admin/arsip_drpp/data_arsip_drpp.php";
					break;
				case 'add-drpp':
					include "admin/arsip_drpp/add_arsip.php";
					break;
				case 'edit-drpp':
					include "admin/arsip_drpp/edit_arsip.php";
					break;
				case 'del-drpp':
					include "admin/arsip_drpp/del_arsip.php";
					break;

			//DASHBOARD USER DISINI =============================================================================//
				
				case 'user-arsip-dus':
					include "user/arsip_dus/data_arsip_dus.php";
					break;
				case 'user-arsip-sp2d':
					include "user/arsip_sp2d/data_arsip_sp2d.php";
					break;
				case 'user-arsip-spm':
					include "user/arsip_spm/data_arsip_spm.php";
					break;
				case 'user-arsip-drpp':
					include "user/arsip_drpp/data_arsip_drpp.php";
					break;

              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Administrator"){
			  $currentPage = 'arsip-home'; // Set halaman yang aktif
              include "home/arsip_home/home.php";
              }
          elseif($data_level=="User"){
              include "home/arsip_home/home.php";
              }
          }
    ?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="https://github.com/Magang-BPS-Kabupaten-Sukabumi-2024">
					<strong> MAGANG</strong>
				</a>
				All rights reserved.
			</div>
			<b>Created 2025</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			// Menambahkan fungsi kustom untuk sorting angka dengan koma
			jQuery.extend(jQuery.fn.dataTable.ext.type.order, {
				"numeric-comma-pre": function(data) {
					// Menghapus koma dan mengonversi data menjadi angka
					return parseFloat(data.replace(/,/g, '')) || 0;
				},
				"numeric-comma-asc": function(a, b) {
					// Sorting naik (ascending)
					return a - b;
				},
				"numeric-comma-desc": function(a, b) {
					// Sorting turun (descending)
					return b - a;
				}
			});
			
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
			$('#example3').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true,
				"columnDefs": [
					{ 
						"type": "numeric-comma", 
						"targets": [/* index kolom yang berisi angka */]
					}
				]
			});
			var table_spm = $('#example5').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,  // Pencarian global aktif
				"ordering": true,
				"info": true,
				"autoWidth": true,
				"columnDefs": [
					// Hanya aktifkan pencarian pada kolom tertentu
					{ 
						"searchable": true, 
						"targets": [1, 2, 3, 5, 6, 7]  // Kolom Tanggal Selesai SP2D (index 2), Tanggal SP2D (index 3), Bulan (index 5), Tahun (index 6)
					},
					{ 
						"searchable": false, 
						"targets": [0]  // Kolom lainnya tidak bisa dicari
					},
					{
						"type": "numeric-comma", 
						"targets": [4] // Kolom Nilai SP2D (index 4) bisa menggunakan format angka dengan koma
					}
				]
			});

			var table_sp2d = $('#example4').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,  // Pencarian global aktif
				"ordering": true,
				"info": true,
				"autoWidth": true,
				"columnDefs": [
					// Hanya aktifkan pencarian pada kolom tertentu
					{ 
						"searchable": true, 
						"targets": [1, 2, 3, 5, 6, 7, 8, 9, 10, 11]  // Kolom Tanggal Selesai SP2D (index 2), Tanggal SP2D (index 3), Bulan (index 5), Tahun (index 6)
					},
					{ 
						"searchable": false, 
						"targets": [0, 4]  // Kolom lainnya tidak bisa dicari
					},
					{
						"type": "numeric-comma", 
						"targets": [4] // Kolom Nilai SP2D (index 4) bisa menggunakan format angka dengan koma
					}
				]
			});

			var table_drpp = $('#example6').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,  // Pencarian global aktif
				"ordering": true,
				"info": true,
				"autoWidth": true,
				"columnDefs": [
					// Hanya aktifkan pencarian pada kolom tertentu
					{ 
						"searchable": true, 
						"targets": [1, 2, 3, 5, 6]  // Kolom Tanggal Selesai SP2D (index 2), Tanggal SP2D (index 3), Bulan (index 5), Tahun (index 6)
					},
					{ 
						"searchable": false, 
						"targets": [0]  // Kolom lainnya tidak bisa dicari
					},
					{
						"type": "numeric-comma", 
						"targets": [4] // Kolom Nilai SP2D (index 4) bisa menggunakan format angka dengan koma
					}
				]
			});

			// Fungsi pencarian kolom khusus tabel sp2d
			$('#search-no-sp2d').on('keyup', function() {
				table_sp2d.column(1).search(this.value).draw();  // Kolom 2 = Tanggal Selesai SP2D
			});
			$('#search-tanggal-selesai').on('keyup', function() {
				table_sp2d.column(2).search(this.value).draw();  // Kolom 2 = Tanggal Selesai SP2D
			});
			$('#search-tanggal').on('keyup', function() {
				table_sp2d.column(3).search(this.value).draw();  // Kolom 3 = Tanggal SP2D
			});
			$('#search-bulan').on('keyup', function() {
				table_sp2d.column(5).search(this.value).draw();  // Kolom 5 = Bulan
			});
			$('#search-tahun').on('keyup', function() {
				table_sp2d.column(6).search(this.value).draw();  // Kolom 6 = Tahun
			});
			$('#search-invoice').on('keyup', function() {
				table_sp2d.column(7).search(this.value).draw();  // Kolom 6 = Tahun
			});
			$('#search-jenis-spm').on('keyup', function() {
				table_sp2d.column(8).search(this.value).draw();  // Kolom 6 = Tahun
			});
			$('#search-jenis-sp2d').on('keyup', function() {
				table_sp2d.column(9).search(this.value).draw();  // Kolom 6 = Tahun
			});
			$('#search-deskripsi').on('keyup', function() {
				table_sp2d.column(10).search(this.value).draw();  // Kolom 6 = Tahun
			});


			// Fungsi pencarian kolom khusus tabel spm
			$('#search-no-spm').on('keyup', function() {
				table_spm.column(2).search(this.value).draw();  // Kolom 2 = Tanggal Selesai SP2D
			});
			$('#search-tanggal-spm').on('keyup', function() {
				table_spm.column(3).search(this.value).draw();  // Kolom 2 = Tanggal Selesai SP2D
			});
			$('#search-jenis-spm').on('keyup', function() {
				table_spm.column(5).search(this.value).draw();  // Kolom 6 = Tahun
			});
			$('#search-deskripsi-spm').on('keyup', function() {
				table_spm.column(6).search(this.value).draw();  // Kolom 6 = Tahun
			});


			// Fungsi pencarian kolom khusus tabel drpp
			$('#search-no-spm-drpp').on('keyup', function() {
				table_drpp.column(1).search(this.value).draw();  // Kolom 2 = Tanggal Selesai SP2D
			});
			$('#search-no-drpp').on('keyup', function() {
				table_drpp.column(2).search(this.value).draw();  // Kolom 2 = Tanggal Selesai SP2D
			});
			$('#search-tanggal-drpp').on('keyup', function() {
				table_drpp.column(3).search(this.value).draw();  // Kolom 2 = Tanggal Selesai SP2D
			});
			$('#search-deskripsi-drpp').on('keyup', function() {
				table_drpp.column(5).search(this.value).draw();  // Kolom 6 = Tahun
			});
		});
	</script>


	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

		<!-- Logout Confirmation Modal -->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-danger text-white">
						<h5 class="modal-title" id="logoutModalLabel"><i class="fas fa-sign-out-alt"></i> Konfirmasi Logout</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body text-center">
						<p>Apakah Anda yakin ingin keluar dari sistem?</p>
					</div>
					<div class="modal-footer justify-content-center">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							<i class="fas fa-times"></i> Batal
						</button>
						<a href="logout.php" class="btn btn-danger">
							<i class="fas fa-check"></i> Ya, Logout
						</a>
					</div>
				</div>
			</div>
		</div>

</body>

</html>