<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Akses</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No SP2D</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_sp2d" name="no_sp2d" placeholder="No SP2D" required oninput="validateText('no_sp2d')">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Selesai SP2D</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_selesai_sp2d" name="tanggal_selesai_sp2d" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal SP2D</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_sp2d" name="tanggal_sp2d" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nilai SP2D</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nilai_sp2d" name="nilai_sp2d" placeholder="Nilai SP2D" required oninput="checkNumericInput('nilai_sp2d')">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bulan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="bulan" name="bulan" placeholder="Bulan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Invoice</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="No Invoice" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jenis_spm" name="jenis_spm" placeholder="Jenis SPM" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis SP2D</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jenis_sp2d" name="jenis_sp2d" placeholder="Jenis SP2D" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Link File</label>
				<div class="col-sm-6">
					<input type="url" class="form-control" id="file_sp2d" name="file_sp2d" placeholder="Link File" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=arsip-sp2d" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_arsip_sp2d (no_sp2d, tanggal_selesai_sp2d, tanggal_sp2d, nilai_sp2d, bulan, tahun, no_invoice, jenis_spm, jenis_sp2d, deskripsi, file_sp2d) VALUES (
        '".$_POST['no_sp2d']."',
		'".$_POST['tanggal_selesai_sp2d']."',
		'".$_POST['tanggal_sp2d']."',
		'".$_POST['nilai_sp2d']."',
		'".$_POST['bulan']."',
        '".$_POST['tahun']."',
		'".$_POST['no_invoice']."',
		'".$_POST['jenis_spm']."',
		'".$_POST['jenis_sp2d']."',
		'".$_POST['deskripsi']."',
		'".$_POST['file_sp2d']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=arsip-sp2d';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=arsip-sp2d';
          }
      })</script>";
    }}
     //selesai proses simpan data
