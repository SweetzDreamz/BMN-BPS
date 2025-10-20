<?
session_start();
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="far fa fa-wallet"></i> Input Keluhan</h3>
	</div>

	<div class="card-body">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<!-- SELECT2 UNTUK JENIS BARANG -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Barang</label>
				<div class="col-sm-6">
					<select id="barang" name="barang" class="form-control select2" required>
						<option value="">-- Pilih Barang --</option>
						<?php 
						$data = mysqli_query($konek,"SELECT * FROM tabel_barang ORDER BY jenis_barang ASC");
						while($d = mysqli_fetch_array($data)){
							echo '<option value="'.$d['kode_barang'].'">'.$d['kode_barang'].' - '.$d['jenis_barang'].'</option>';
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal" name="tanggal" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keluhan</label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="3" name="keluhan" required></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Hasil Pengecekkan</label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="3" name="hasil" required></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tindakan</label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="3" name="tindakan" required></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Biaya (Rp)</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya (Rp)" required>
				</div>
			</div>

			<!-- SELECT2 UNTUK PIHAK YANG MENGERJAKAN -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pihak Yang Mengerjakan</label>
				<div class="col-sm-6">
					<select id="pihak" name="pihak" class="form-control select2" required>
						<option value="">-- Pilih Pegawai --</option>
						<?php 
						$data = mysqli_query($konek,"SELECT * FROM tabel_pegawai ORDER BY Nama ASC");
						while($d = mysqli_fetch_array($data)){
							echo '<option value="'.$d['Nama'].'">'.$d['Nama'].'</option>';
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="col-sm-2 col-form-label">Paraf Pelaksana</label>
				<div class="col-sm-6">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="✔" id="paraf_pelaksana" name="paraf_pelaksana" required>
						<label class="form-check-label" for="paraf_pelaksana">Disetujui</label>
					</div>
				</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="col-sm-2 col-form-label">Paraf Pengurus BMN</label>
				<div class="col-sm-6">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="✔" id="paraf_pengurus" name="paraf_pengurus" required>
						<label class="form-check-label" for="paraf_pengurus">Disetujui</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="3" name="keterangan" required></textarea>
				</div>
			</div>

		</div>

		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengguna" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<!-- ==============================
     SCRIPT UNTUK SELECT2
================================= -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
/* Pastikan tampilan Select2 sama tinggi dengan form-control Bootstrap */
.select2-container--default .select2-selection--single {
    height: 38px !important; /* tinggi sesuai input form-control */
    border: 1px solid #ced4da !important;
    border-radius: 0.25rem !important;
    padding: 6px 12px !important;
}

/* Atur posisi teks di tengah vertikal */
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 24px !important;
}

/* Sesuaikan posisi panah dropdown */
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px !important;
    top: 1px !important;
    right: 10px;
}

/* Lebar select2 100% biar sejajar dengan input lain */
.select2-container {
    width: 100% !important;
}
</style>

<script>
$(document).ready(function() {
    // Inisialisasi Select2
    $('.select2').select2({
        allowClear: true,
        width: 'resolve'
    });
});
</script>

<?php

if (isset($_POST['Simpan'])) {
    // Ambil NIP user yang login dari session
    $nip = $_SESSION['ses_id'];

$sql_simpan = "INSERT INTO tabel_tiket 
    (kode_barang, NIP, tanggal, keluhan, hasil_pengecekan, tindakan, biaya, pihak_mengerjakan, paraf_pelaksana, paraf_pengurus, keterangan)
    VALUES (
        '".$_POST['barang']."',
        '$nip',
        '".$_POST['tanggal']."',
        '".$_POST['keluhan']."',
        '".$_POST['hasil']."',
        '".$_POST['tindakan']."',
        '".$_POST['biaya']."',
        '".$_POST['pihak']."',
        '".$_POST['paraf_pelaksana']."',
        '".$_POST['paraf_pengurus']."',
        '".$_POST['keterangan']."'
    )";


    // Jalankan query
    $query_simpan = mysqli_query($konek, $sql_simpan);
    mysqli_close($konek);

    // Cek hasil
    if ($query_simpan) {
        echo "<script>
        Swal.fire({
            title: 'Tambah Data Berhasil',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) { window.location = 'index.php?page=arsip-dus'; }
        })
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            title: 'Tambah Data Gagal',
            text: '".mysqli_error($konek)."',
            icon: 'error',
            confirmButtonText: 'OK'
        })
        </script>";
    }
}


?>
