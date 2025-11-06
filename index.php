<?php
session_start();
if (empty($_SESSION["ses_username"])) {
    header("location: login.php");
    exit;
}

include "aksi.php";

$data_id = $_SESSION["ses_id"];
$data_nama = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];

$sql_profil = "SELECT * FROM tabel_pegawai WHERE NIP = '$data_id' LIMIT 1";
$query_profil = mysqli_query($konek, $sql_profil);
$data_profil = mysqli_fetch_array($query_profil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>BMN</title>
    <link rel="icon" href="dist/img/LogoBPS.PNG">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ====== Styles ====== -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif !important; font-size: 14px; }
        .content-wrapper { padding-top: 20px; }
        .card { margin-bottom: 15px; }

        .modal-content {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .modal-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        /* Pastikan modal tampil di atas sidebar/navbar */
        .modal-backdrop.show {
            z-index: 1040 !important;
        }
        .modal {
            z-index: 1050 !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- ====== Navbar ====== -->
    <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars text-white"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <span class="text-white font-weight-bold">BADAN PUSAT STATISTIK KOTA BOGOR</span>
        </ul>
    </nav>

    <!-- ====== Sidebar ====== -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index.php" class="brand-link">
            <img src="dist/img/LogoBPS.png" alt="Logo" class="brand-image" style="opacity:.8">
            <span class="brand-text">BMN</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                <div class="image">
                    <img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
                </div>
                <div class="info">
                    <!-- Tombol buka modal profil -->
                    <a href="#" class="d-block" data-toggle="modal" data-target="#profilModal">
                        <?php echo $data_nama; ?>
                    </a>
                    <?php
                    $badge_class = match ($data_level) {
                        'Pengurus BMN' => 'badge-success',
                        'Kepala BPS Kabupaten/Kota' => 'badge-primary',
                        'Kasubbag' => 'badge-warning',
                        'IPDS' => 'badge-info',
                        'Pengguna' => 'badge-secondary',
                        default => 'badge-light',
                    };
                    ?>
                    <span class="badge <?php echo $badge_class; ?>"><?php echo $data_level; ?></span>
                </div>
            </div>

			<!-- Menu Sidebar -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
					<li class="nav-item">
						<a href="?page=arsip-home" class="nav-link <?php echo ($_GET['page'] ?? '') == 'arsip-home' ? 'active' : ''; ?>">
							<i class="nav-icon fas fa-home"></i><p>Home</p>
						</a>
					</li>

					<?php if ($data_level == "Pengurus BMN") { 
						$is_keluhan = in_array($_GET['page'] ?? '', ['input_keluhan','lihat_tiket_keluhan']);
					?>
					<li class="nav-item has-treeview <?php echo $is_keluhan ? 'menu-open' : ''; ?>">
						<a href="#" class="nav-link <?php echo $is_keluhan ? 'active' : ''; ?>">
							<i class="nav-icon fas fa-box"></i>
							<p>Kartu BMN<i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="?page=input_keluhan" class="nav-link <?php echo ($_GET['page'] ?? '') == 'input_keluhan' ? 'active' : ''; ?>">
									<i class="fas fa-ticket-alt nav-icon"></i><p>Input Keluhan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=lihat_tiket_keluhan" class="nav-link <?php echo ($_GET['page'] ?? '') == 'lihat_tiket_keluhan' ? 'active' : ''; ?>">
									<i class="fas fa-folder-open nav-icon"></i><p>Lihat Tiket</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-header"><i class="nav-icon fas fa-cog"></i> Settings</li>
					<li class="nav-item">
						<a href="?page=data-pengguna" class="nav-link <?php echo ($_GET['page'] ?? '') == 'data-pengguna' ? 'active' : ''; ?>">
							<i class="nav-icon fas fa-user"></i><p>Kelola Akses</p>
						</a>
					</li>
					<?php } ?>

					<?php if ($data_level == "Pengguna") { 
						$is_user_keluhan = in_array($_GET['page'] ?? '', ['user-input_keluhan','user-lihat_tiket_keluhan']);
					?>
					<li class="nav-item has-treeview <?php echo $is_user_keluhan ? 'menu-open' : ''; ?>">
						<a href="#" class="nav-link <?php echo $is_user_keluhan ? 'active' : ''; ?>">
							<i class="nav-icon fas fa-box"></i>
							<p>Kartu BMN<i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="?page=user-input_keluhan" class="nav-link <?php echo ($_GET['page'] ?? '') == 'user-input_keluhan' ? 'active' : ''; ?>">
									<i class="fas fa-ticket-alt nav-icon"></i><p>Input Tiket</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=user-lihat_tiket_keluhan" class="nav-link <?php echo ($_GET['page'] ?? '') == 'user-lihat_tiket_keluhan' ? 'active' : ''; ?>">
									<i class="fas fa-folder-open nav-icon"></i><p>Lihat Tiket</p>
								</a>
							</li>
						</ul>
					</li>
					<?php } ?>

					<li class="nav-item">
						<a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
							<i class="nav-icon fas fa-sign-out-alt text-danger"></i><p>Logout</p>
						</a>
					</li>
				</ul>
			</nav>

        </div>
    </aside>

    <!-- ====== Konten ====== -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <?php
                $page = $_GET['page'] ?? '';
                switch ($page) {
                    case 'arsip-home': include "home/home.php"; break;
                    case 'data-pengguna': include "admin/pengguna/data_pengguna.php"; break;
                    case 'input_keluhan': include "admin/input-keluhan/input_keluhan.php"; break;
                    case 'lihat_tiket_keluhan': include "admin/lihat-tiket-keluhan/lihat_tiket_keluhan.php"; break;
                    case 'user-input_keluhan': include "user/input-keluhan/input_keluhan.php"; break;
                    case 'user-lihat_tiket_keluhan': include "user/lihat-tiket-keluhan/lihat_tiket_keluhan.php"; break;
                    default: include "home/home.php"; break;
                }
                ?>
            </div>
        </section>
    </div>

    <!-- ====== Footer ====== -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            © <a href="https://github.com/SweetzDreamz" target="_blank"><strong>MAGANG</strong></a> All rights reserved.
        </div>
        <b>Created 2025</b>
    </footer>
</div>

<!-- ====== Modal PROFIL ====== -->
<div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-user-circle"></i> Profil Pengguna</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center mb-3">
          <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image" width="80">
          <h5 class="mt-2 mb-0"><?php echo $data_nama; ?></h5>
          <small class="text-muted"><?php echo $data_level; ?></small>
        </div>
        <table class="table table-sm table-bordered">
          <tr><th>NIP</th><td><?php echo $data_profil['NIP'] ?? '-'; ?></td></tr>
          <tr><th>Nama</th><td><?php echo $data_profil['Nama'] ?? '-'; ?></td></tr>
          <tr><th>Jabatan</th><td><?php echo $data_profil['Jabatan'] ?? '-'; ?></td></tr>
          <tr><th>Unit Kerja</th><td><?php echo $data_profil['Unit_Kerja'] ?? '-'; ?></td></tr>
          <tr><th>Email</th><td><?php echo $data_profil['Email'] ?? '-'; ?></td></tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- ====== Modal LOGOUT ====== -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title"><i class="fas fa-sign-out-alt"></i> Konfirmasi Logout</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p>Apakah Anda yakin ingin keluar dari sistem?</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        <a href="logout.php" class="btn btn-danger"><i class="fas fa-check"></i> Ya, Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- ====== Script ====== -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<script>
$(function() {
    $('table[id^=example]').each(function() {
        if (!$.fn.DataTable.isDataTable(this)) {
            $(this).DataTable({ paging:true, searching:true, ordering:true, info:true, autoWidth:false });
        }
    });
    $('.select2').select2();
    $('.select2bs4').select2({ theme:'bootstrap4' });
});
</script>

</body>
</html>
