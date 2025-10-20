<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_arsip_drpp WHERE kode_drpp='".$_GET['kode']."'";
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

			<input type='hidden' class="form-control" name="kode_drpp" value="<?php echo $data_cek['kode_drpp']; ?>"
			readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_spm" name="no_spm" value="<?php echo $data_cek['no_spm']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No DRPP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_drpp" name="no_drpp" value="<?php echo $data_cek['no_drpp']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal DRPP</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_drpp" name="tanggal_drpp" value="<?php echo $data_cek['tanggal_drpp']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nilai DRPP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nilai_drpp" name="nilai_drpp" value="<?php echo $data_cek['nilai_drpp']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">detail</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="detail" name="detail" value="<?php echo $data_cek['detail']; ?>"
					/>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Link File</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="file_drpp" name="file_drpp" value="<?php echo $data_cek['file_drpp']; ?>"
					/>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=arsip-drpp" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

	if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_arsip_drpp SET
		no_spm='".$_POST['no_spm']."',
		no_drpp='".$_POST['no_drpp']."',
		tanggal_drpp='".$_POST['tanggal_drpp']."',
		nilai_drpp='".$_POST['nilai_drpp']."',
        detail='".$_POST['detail']."',
		file_drpp='".$_POST['file_drpp']."'
		WHERE kode_drpp='".$_POST['kode_drpp']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
    	echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-drpp';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-drpp';
        }
      })</script>";
 	}}
?>