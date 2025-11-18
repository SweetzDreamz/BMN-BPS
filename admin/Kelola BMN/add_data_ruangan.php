<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Ruangan
		</h3>
	</div>

	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group">
				<label for="kode_ruangan">Kode Ruangan</label>
				<input type="text" class="form-control" id="kode_ruangan" 
				       name="kode_ruangan" placeholder="Masukkan kode ruangan" required>
			</div>

			<div class="form-group">
				<label for="nama_ruangan">Nama Ruangan</label>
				<input type="text" class="form-control" id="nama_ruangan" 
				       name="nama_ruangan" placeholder="Masukkan nama ruangan" required>
			</div>

			<div class="form-group">
				<label for="tipe_ruangan">Tipe Ruangan</label>
                <input type="text" class="form-control" id="tipe_ruangan" 
                       name="tipe_ruangan" placeholder="Masukkan tipe ruangan" required>
			</div>

			<div class="form-group">
				<label for="luas_ruangan_m2">Luas Ruangan (m²)</label>
				<input type="number" class="form-control" id="luas_ruangan_m2" 
				       name="luas_ruangan_m2" placeholder="Masukkan luas ruangan" required>
			</div>

			<div class="form-group">
				<label for="keterangan_ruangan">Keterangan Ruangan</label>
				<textarea class="form-control" id="keterangan_ruangan" name="keterangan_ruangan" 
				          placeholder="Masukkan keterangan ruangan" rows="3"></textarea>
			</div>

		</div>

		<div class="card-footer text-right">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=kelola_data_ruangan" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<style>

.card.card-info {
	border-radius: 12px;
	box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
	border: none;
}

.card-header {
	background: linear-gradient(135deg, #007bff, #00a0ff);
	color: white;
	border-top-left-radius: 12px;
	border-top-right-radius: 12px;
	padding: 16px 20px;
}

.card-header h3 {
	margin: 0;
	font-weight: 600;
}

.form-group label {
	font-weight: 500;
	color: #343a40;
	margin-bottom: 6px;
	display: block;
	transition: color 0.2s ease;
}

.form-control {
	border: 1.5px solid #ced4da;
	border-radius: 8px !important;
	padding: 10px 12px;
	transition: all 0.25s ease;
}

.form-control:focus {
	border-color: #007bff !important;
	box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.15);
}

.form-group {
	margin-bottom: 18px;
}

.card-footer {
	background-color: #f8f9fa;
	border-bottom-left-radius: 12px;
	border-bottom-right-radius: 12px;
	padding: 14px 20px;
}

.btn-info {
	background: linear-gradient(135deg, #007bff, #00a0ff);
	border-radius: 8px;
	border: none;
	padding: 10px 18px;
	font-weight: 500;
	transition: all 0.2s ease;
}
.btn-info:hover {
	transform: translateY(-2px);
	box-shadow: 0 3px 10px rgba(0, 123, 255, 0.4);
}
 .btn-secondary {
    border-radius: 8px;
    padding: 10px 18px;
}
</style>


<script>
$(document).ready(function() {
	$('input, textarea, select').on('focus', function() {
		$(this).closest('.form-group').addClass('active-group');
	}).on('blur', function() {
		$(this).closest('.form-group').removeClass('active-group');
	});
});
</script>

<style>
.active-group label {
	color: #007bff !important;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (isset($_POST['Simpan'])) {

	$kode_ruangan      = $_POST['kode_ruangan'];
	$nama_ruangan      = $_POST['nama_ruangan'];
	$tipe_ruangan      = $_POST['tipe_ruangan'];
	$luas_ruangan_m2   = $_POST['luas_ruangan_m2'];
	$keterangan_ruangan = $_POST['keterangan_ruangan'];

	$sql_simpan = "INSERT INTO tabel_ruangan 
		(kode_ruangan, nama_ruangan, keterangan_ruangan, tipe_ruangan, luas_ruangan_m2)
		VALUES (
			'$kode_ruangan',
			'$nama_ruangan',
			'$keterangan_ruangan',
			'$tipe_ruangan',
			'$luas_ruangan_m2'
		)";

	$query_simpan = mysqli_query($konek, $sql_simpan);
	mysqli_close($konek);

	if ($query_simpan) {
		echo "<script>
		Swal.fire({
			title: 'Tambah Data Berhasil',
			icon: 'success',
			confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=kelola_data_ruangan';
			}
		})
		</script>";
	} else {
		echo "<script>
		Swal.fire({
			title: 'Tambah Data Gagal',
			icon: 'error',
			confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=add_data_ruangan';
			}
		})
		</script>";
	}
}
?>
