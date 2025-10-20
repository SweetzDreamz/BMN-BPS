<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_arsip_spm WHERE kode_spm='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" name="kode_spm" value="<?php echo $data_cek['kode_spm']; ?>"
			readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Map</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_map" name="no_map" value="<?php echo $data_cek['no_map']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_spm" name="no_spm" value="<?php echo $data_cek['no_spm']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal SPM</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_spm" name="tanggal_spm" value="<?php echo $data_cek['tanggal_spm']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nilai SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nilai_spm" name="nilai_spm" value="<?php echo $data_cek['nilai_spm']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jenis_spm" name="jenis_spm" value="<?php echo $data_cek['jenis_spm']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data_cek['deskripsi']; ?>"
					/>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Link File</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="file_spm" name="file_spm" value="<?php echo $data_cek['file_spm']; ?>"
					/>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=arsip-spm" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

	if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_arsip_spm SET
		no_map='".$_POST['no_map']."',
		no_spm='".$_POST['no_spm']."',
		tanggal_spm='".$_POST['tanggal_spm']."',
		nilai_spm='".$_POST['nilai_spm']."',
        jenis_spm='".$_POST['jenis_spm']."',
		deskripsi='".$_POST['deskripsi']."',
		file_spm='".$_POST['file_spm']."'
		WHERE kode_spm='".$_POST['kode_spm']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
    	echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-spm';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-spm';
        }
      })</script>";
 	}}
?>