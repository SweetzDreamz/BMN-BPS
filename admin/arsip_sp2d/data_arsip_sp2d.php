<div class="card card-info">
	
	<div class="card-header">
		<h3 class="card-title">
			<i class="far fa fa-wallet"></i> Tiket Keluhan</h3>
	</div>
	
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=arsip-dus" class="btn btn-primary">
					<i class="fa fa-edit"></i> Input Keluhan</a>
			</div>
			<br>
			<?php


// Pastikan user sudah login
if (!isset($_SESSION['ses_id'])) {
    echo "<script>
    alert('Silakan login terlebih dahulu!');
    window.location = '../../login.php';
    </script>";
    exit;
}

// Ambil NIP user yang sedang login
$nip_login = $_SESSION['ses_id'];
?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-list"></i> Daftar Tiket Keluhan Anda</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Tanggal</th>
                        <th>Keluhan</th>
                        <th>Hasil Pengecekan</th>
                        <th>Tindakan</th>
                        <th>Biaya (Rp)</th>
                        <th>Pihak Mengerjakan</th>
                        <th>Paraf Pelaksana</th>
                        <th>Paraf Pengurus</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Ambil data dari tabel_tiket milik user login saja
                    $sql = mysqli_query($konek, "SELECT * FROM tabel_tiket WHERE NIP='$nip_login' ORDER BY tanggal DESC");
                    $no = 1;

                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo $data['kode_barang']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                            <td><?php echo $data['keluhan']; ?></td>
                            <td><?php echo $data['hasil_pengecekan']; ?></td>
                            <td><?php echo $data['tindakan']; ?></td>
                            <td align="right"><?php echo number_format($data['biaya'], 0, ',', '.'); ?></td>
                            <td><?php echo $data['pihak_mengerjakan']; ?></td>
                            <td align="center"><?php echo $data['paraf_pelaksana']; ?></td>
                            <td align="center"><?php echo $data['paraf_pengurus']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambahkan DataTables agar tabel bisa diurutkan, dicari, dll -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
$(function () {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
    });
});
</script>

	
	<!-- JavaScript di dalam tag <script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleSearch() {
			var container = document.getElementById("search-container");
			if (container.style.display === "none" || container.style.display === "") {
				container.style.display = "grid"; // Tampilkan dengan gaya grid
			} else {
				container.style.display = "none"; // Sembunyikan
			}
		}
    </script>


	<style>
		
        /* Menyembunyikan pencarian global pada DataTable */
        .dataTables_filter {
            display: none;  /* Menyembunyikan input pencarian global */
        }
    
		.search-container {
			display: none; /* Mulai dalam keadaan tersembunyi */
			max-width: 750px; /* Lebar maksimum */
    		min-width: 200px; /* Lebar minimum */
			grid-template-columns: repeat(4, 1fr);
			gap: 20px;
			padding: 10px;
			background-color: #f8f9fa;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.search-container label {
			font-weight: normal;
			font-size: 15px;
		}

		.search-container input {
			padding: 10px;
			font-size: 15px;
			width: 100%;
		}
    </style>
	