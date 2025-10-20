<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Akses</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="NIP" name="NIP" placeholder="NIP" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP Lama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="NIP Lama" name="nip_lama" placeholder="NIP Lama" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-6">
						<select name="jabatan" id="jabatan" class="form-control" required>
							<option>- Pilih -</option>
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
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Akhir</label>
				<div class="col-sm-6">
						<select name="golongan_akhir" id="golongan Akhir" class="form-control" required>
							<option>- Pilih -</option>
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

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Email (BPS)</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="email bps" name="email_bps" placeholder="Email BPS" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Email (Pribadi)</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="email gmail" name="email_gmail" placeholder="Email Pribadi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="password" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Role</label>
				<div class="col-sm-6">
					<select name="role" id="role" class="form-control" required>
							<option>- Pilih -</option>
							<option>Kepala BPS Kabupaten/Kota</option>
							<option>Pengurus BMN</option>
							<option>Kasubbag</option>
							<option>IPDS</option>
							<option>Pengguna</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
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
     //selesai proses simpan data
