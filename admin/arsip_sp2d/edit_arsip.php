<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_arsip_sp2d WHERE kode_sp2d='".$_GET['kode']."'";
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

			<input type='hidden' class="form-control" name="kode_sp2d" value="<?php echo $data_cek['kode_sp2d']; ?>"
			readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No SP2D</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_sp2d" name="no_sp2d" value="<?php echo $data_cek['no_sp2d']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Selesai SP2D</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_selesai_sp2d" name="tanggal_selesai_sp2d" value="<?php echo $data_cek['tanggal_selesai_sp2d']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal SP2D</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_sp2d" name="tanggal_sp2d" value="<?php echo $data_cek['tanggal_sp2d']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nilai SP2D</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nilai_sp2d" name="nilai_sp2d" value="<?php echo $data_cek['nilai_sp2d']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bulan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="bulan" name="bulan" value="<?php echo $data_cek['bulan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $data_cek['tahun']; ?>"
					/>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">No Invoice</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_invoice" name="no_invoice" value="<?php echo $data_cek['no_invoice']; ?>"
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
				<label class="col-sm-2 col-form-label">Jenis SP2D</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jenis_sp2d" name="jenis_sp2d" value="<?php echo $data_cek['jenis_sp2d']; ?>"
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
					<input type="text" class="form-control" id="file_sp2d" name="file_sp2d" value="<?php echo $data_cek['file_sp2d']; ?>"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=arsip-sp2d" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

	if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_arsip_sp2d SET
		no_sp2d='".$_POST['no_sp2d']."',
		tanggal_selesai_sp2d='".$_POST['tanggal_selesai_sp2d']."',
		tanggal_sp2d='".$_POST['tanggal_sp2d']."',
		nilai_sp2d='".$_POST['nilai_sp2d']."',
		bulan='".$_POST['bulan']."',
        tahun='".$_POST['tahun']."',
		no_invoice='".$_POST['no_invoice']."',
		jenis_spm='".$_POST['jenis_spm']."',
		jenis_sp2d='".$_POST['jenis_sp2d']."',
		deskripsi='".$_POST['deskripsi']."',
		file_sp2d='".$_POST['file_sp2d']."'
		WHERE kode_sp2d='".$_POST['kode_sp2d']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
    	echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-sp2d';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=arsip-sp2d';
        }
      })</script>";
 	}}
?>