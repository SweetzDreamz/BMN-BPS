<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_arsip_dus WHERE kode_dus='".$_GET['kode']."'";
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

			<input type='hidden' class="form-control" name="kode_dus" value="<?php echo $data_cek['kode_dus']; ?>"
			readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Dus</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_dus" name="no_dus" value="<?php echo $data_cek['no_dus']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Map</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_map" name="no_map" value="<?php echo $data_cek['no_map']; ?>"
					/>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=arsip-dus" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

	if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_arsip_dus SET
		no_dus='".$_POST['no_dus']."',
		no_map='".$_POST['no_map']."'
		WHERE kode_dus='".$_POST['kode_dus']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
    	echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-dus';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-dus';
        }
      })</script>";
 	}}
?>