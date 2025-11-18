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
    <title>E-Tiket BMN</title>
    <link rel="icon" href="dist/img/LogoBPS.PNG">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        .modal-backdrop.show {
            z-index: 1040 !important;
        }
        .modal {
            z-index: 1050 !important;
        }

        .nav-sidebar .nav-treeview {
            font-size: 13px;          
            margin-left: 12px;        
        }

        .nav-sidebar .nav-treeview .nav-item .nav-link {
            padding-left: 28px;      
        }

        .nav-sidebar .nav-treeview .nav-link i.nav-icon {
            font-size: 13px;          
            margin-right: 6px;
        }

        .nav-sidebar .nav-treeview .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            border-radius: 6px;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

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

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index.php" class="brand-link">
            <img src="dist/img/LogoBPS.png" alt="Logo" class="brand-image" style="opacity:.8">
            <span class="brand-text">E-Tiket BMN</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                <?php
                $nama_inisial = strtoupper(substr($data_nama, 0, 1)); // ambil huruf pertama nama
                $warna_bg = substr(md5($data_nama), 0, 6); // warna unik berdasarkan nama
                ?>
                <a href="#" data-toggle="modal" data-target="#profilModal">
                    <div class="image" style="padding-top: 6px;">
                        <div class="profile-circle" style="
                            width: 35px; height: 35px;
                            border-radius: 50%;
                            background-color: #<?php echo $warna_bg; ?>;
                            display: flex; align-items: center; justify-content: center;
                            color: white; font-weight: bold; font-size: 16px;
                        ">
                            <?php echo $nama_inisial; ?>
                        </div>
                    </div>
                </a>

                <div class="info">
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
									<i class="fas fa-ticket-alt nav-icon"></i><p>Buat Tiket</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=lihat_tiket_keluhan" class="nav-link <?php echo ($_GET['page'] ?? '') == 'lihat_tiket_keluhan' ? 'active' : ''; ?>">
									<i class="fas fa-folder-open nav-icon"></i><p>Lihat Tiket</p>
								</a>
							</li>
						</ul>
					</li>

                    <?php  
                        $is_kelola = in_array($_GET['page'] ?? '', [
                            'kelola_data_bmn',
                            'kelola_data_ruangan'
                        ]);
                    ?>
					<li class="nav-item has-treeview <?php echo $is_kelola ? 'menu-open' : ''; ?>">
						<a href="#" class="nav-link <?php echo $is_kelola ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Kelola BMN
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="?page=kelola_data_bmn" class="nav-link <?php echo ($_GET['page'] ?? '') == 'kelola_data_bmn' ? 'active' : ''; ?>">
                                    <i class="fas fa-boxes nav-icon"></i>
                                    <p>Kelola Data BMN</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?page=kelola_data_ruangan" class="nav-link <?php echo ($_GET['page'] ?? '') == 'kelola_data_ruangan' ? 'active' : ''; ?>">
                                    <i class="fas fa-door-open nav-icon"></i>
                                    <p>Kelola Data Ruangan</p>
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


    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <?php
                $page = $_GET['page'] ?? '';
                switch ($page) {
                    case 'arsip-home': include "home/home.php"; break;
                    case 'data-pengguna': include "admin/pengguna/data_pengguna.php"; break;
                    case 'edit-pengguna': include "admin/pengguna/edit_pengguna.php"; break;
                    case 'add-pengguna': include "admin/pengguna/add_pengguna.php"; break;
                    case 'del-pengguna': include "admin/pengguna/del_pengguna.php"; break;
                    case 'input_keluhan': include "admin/input-keluhan/input_keluhan.php"; break;
                    case 'lihat_tiket_keluhan': include "admin/lihat-tiket-keluhan/lihat_tiket_keluhan.php"; break;
                    case 'user-input_keluhan': include "user/input-keluhan/input_keluhan.php"; break;
                    case 'user-lihat_tiket_keluhan': include "user/lihat-tiket-keluhan/lihat_tiket_keluhan.php"; break;
                    case 'kelola_data_bmn': include "admin/Kelola BMN/kelola_data_bmn.php"; break;
                    case 'kelola_data_ruangan': include "admin/Kelola BMN/kelola_data_ruangan.php"; break;
                    case 'edit_data_ruangan': include "admin/Kelola BMN/edit_data_ruangan.php"; break;
                    case 'add_data_ruangan': include "admin/Kelola BMN/add_data_ruangan.php"; break;
                    case 'del_data_ruangan': include "admin/Kelola BMN/del_data_ruangan.php"; break;
                    default: include "home/home.php"; break;
                }
                ?>
            </div>
        </section>
    </div>


    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            © <a href="https://github.com/SweetzDreamz" target="_blank"><strong>MAGANG</strong></a> All rights reserved.
        </div>
        <b>Created 2025</b>
    </footer>
</div>


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
          <?php
            $nama_inisial = strtoupper(substr($data_nama, 0, 1)); // huruf pertama nama
            $warna_bg = substr(md5($data_nama), 0, 6); // warna unik per nama
          ?>
          <div style="display: flex; justify-content: center;">
              <div class="profile-circle-modal" style="
                  width: 80px; height: 80px;
                  border-radius: 50%;
                  background-color: #<?php echo $warna_bg; ?>;
                  display: flex; align-items: center; justify-content: center;
                  color: white; font-weight: bold; font-size: 32px;
                  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
              ">
                  <?php echo $nama_inisial; ?>
              </div>
          </div>
          <h5 class="mt-3 mb-0"><?php echo $data_nama; ?></h5>
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

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
