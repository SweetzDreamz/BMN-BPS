<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Akses
		</h3>
	</div>

	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="NIP">NIP</label>
					<input type="text" class="form-control" id="NIP" name="NIP" placeholder="Masukkan NIP" required>
				</div>

				<div class="form-group col-md-6">
					<label for="nip_lama">NIP Lama</label>
					<input type="text" class="form-control" id="nip_lama" name="nip_lama" placeholder="Masukkan NIP Lama" required>
				</div>
			</div>

			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="jabatan" class="form-control" required>
						<option value="">- Pilih -</option>
						<option>Kepala BPS Kabupaten/Kota</option>
						<option>Statistisi Ahli Madya</option>
						<option>Kepala Subbagian Umum</option>
						<option>Staf Subbagian Tata Usaha</option>
						<option>Statistisi Ahli Pertama</option>
						<option>Statistisi Ahli Muda</option>
						<option>Statistisi Penyelia</option>
						<option>Pranata Komputer Ahli Muda</option>
						<option>Pelaksana</option>
						<option>PK APBN Terampil</option>
					</select>
				</div>

				<div class="form-group col-md-6">
					<label for="golongan_akhir">Golongan Akhir</label>
					<select name="golongan_akhir" id="golongan_akhir" class="form-control" required>
						<option value="">- Pilih -</option>
						<optgroup label="Golongan I">
							<option>I/a</option>
							<option>I/b</option>
							<option>I/c</option>
							<option>I/d</option>
						</optgroup>
						<optgroup label="Golongan II">
							<option>II/a</option>
							<option>II/b</option>
							<option>II/c</option>
							<option>II/d</option>
						</optgroup>
						<optgroup label="Golongan III">
							<option>III/a</option>
							<option>III/b</option>
							<option>III/c</option>
							<option>III/d</option>
						</optgroup>
						<optgroup label="Golongan IV">
							<option>IV/a</option>
							<option>IV/b</option>
							<option>IV/c</option>
							<option>IV/d</option>
							<option>IV/e</option>
						</optgroup>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="email_bps">Alamat Email (BPS)</label>
					<input type="email" class="form-control" id="email_bps" name="email_bps" placeholder="Masukkan Email BPS" required>
				</div>

				<div class="form-group col-md-6">
					<label for="email_gmail">Alamat Email (Pribadi)</label>
					<input type="email" class="form-control" id="email_gmail" name="email_gmail" placeholder="Masukkan Email Pribadi" required>
				</div>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
			</div>

			<div class="form-group">
				<label for="role">Role</label>
				<select name="role" id="role" class="form-control" required>
					<option value="">- Pilih -</option>
					<option>Kepala BPS Kabupaten/Kota</option>
					<option>Pengurus BMN</option>
					<option>Kasubbag</option>
					<option>IPDS</option>
					<option>Pengguna</option>
				</select>
			</div>

		</div>

		<div class="card-footer text-right">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengguna" class="btn btn-secondary">Batal</a>
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
    font-weight: 600;
    margin: 0;
}

.form-group label {
    font-weight: 500;
    color: #343a40;
    margin-bottom: 6px;
    display: block;
    transition: color 0.2s ease;
}

.form-control,
.select2-container--default .select2-selection--single {
    border: 1.5px solid #ced4da;
    border-radius: 8px !important;
    transition: all 0.25s ease;
    padding: 10px 12px;
    font-size: 15px;
}

.form-control:focus,
.select2-container--default .select2-selection--single:focus,
.select2-container--default.select2-container--focus .select2-selection--single {
    border-color: #007bff !important;
    box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.15);
}

.form-group:focus-within label {
    color: #007bff;
}

.form-group,
.form-row {
    margin-bottom: 18px;
}

.form-check-label {
    font-weight: 500;
}
.form-check-input {
    transform: scale(1.2);
    margin-right: 8px;
}

.card-footer {
    border-top: 1px solid #dee2e6;
    background-color: #f8f9fa;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
    padding: 14px 20px;
}

.btn-info {
    background: linear-gradient(135deg, #007bff, #00a0ff);
    border: none;
    border-radius: 8px;
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

.select2-container--default .select2-selection--single {
    height: 42px !important;
    display: flex;
    align-items: center;
}
.select2-container--default .select2-selection__rendered {
    line-height: 30px !important;
    padding-left: 8px;
}
.select2-container--default .select2-selection__arrow {
    height: 40px !important;
}

::placeholder {
    color: #adb5bd !important;
}

@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
    }
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<?php

    if (isset ($_POST['Simpan'])){
        $sql_simpan = "INSERT INTO tabel_pegawai (NIP, `NIP Lama`, Nama, Jabatan, `Golongan Akhir`, `Alamat Email BPS`, `Alamat Gmail`, Password, Role) VALUES (
        '".$_POST['NIP']."',
        '".$_POST['nip_lama']."',
		'".$_POST['nama']."',
		'".$_POST['jabatan']."',
        '".$_POST['golongan_akhir']."',
		'".$_POST['email_bps']."',
		'".$_POST['email_gmail']."',
		'".$_POST['password']."',
        '".$_POST['role']."')";
		
        $query_simpan = mysqli_query($konek, $sql_simpan);
        mysqli_close($konek);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengguna';
          }
      })</script>";
    }}

