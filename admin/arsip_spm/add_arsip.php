<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Map</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_map" name="no_map" placeholder="No Dus"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_spm" name="no_spm" placeholder="No SPM"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal SPM</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_spm" name="tanggal_spm" placeholder="Tanggal SPM" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nilai SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nilai_spm" name="nilai_spm" placeholder="Nilai SPM" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis SPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jenis_spm" name="jenis_spm" placeholder="Jenis SPM" required>
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
					<input type="url" class="form-control" id="file_spm" name="file_spm" placeholder="Link File" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=arsip-spm" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<script>
function checkNumericInput(fieldId) {
    var fieldValue = document.getElementById(fieldId).value;
    if (isNaN(fieldValue)) {
        alert(fieldId.replace('_', ' ') + ' harus berupa angka.');
        document.getElementById(fieldId).value = '';
    }
}

function validateText(fieldId) {
    var fieldValue = document.getElementById(fieldId).value;
    if (/[^a-zA-Z0-9\s]/.test(fieldValue)) {
        alert(fieldId.replace('_', ' ') + ' hanya boleh mengandung huruf dan angka.');
        document.getElementById(fieldId).value = '';
    }
}

function validateForm() {
    var fields = ['nilai_sp2d', 'no_sp2d', 'no_spm', 'no_drpp', 'detail', 'no_dus', 'no_map'];
    for (var i = 0; i < fields.length; i++) {
        var fieldId = fields[i];
        var fieldValue = document.getElementById(fieldId).value;
        if (fieldValue === '' || /[^a-zA-Z0-9\s]/.test(fieldValue)) {
            alert(fieldId.replace('_', ' ') + ' harus valid.');
            return false;
        }
    }
    return true;
}
</script>


<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_arsip_spm (no_map, no_spm, tanggal_spm, nilai_spm, jenis_spm, deskripsi,file_spm) VALUES (
		'".$_POST['no_map']."',
		'".$_POST['no_spm']."',
		'".$_POST['tanggal_spm']."',
		'".$_POST['nilai_spm']."',
        '".$_POST['jenis_spm']."',
		'".$_POST['deskripsi']."',
		'".$_POST['file_spm']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=arsip-spm';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=arsip-spm';
          }
      })</script>";
    }}
     //selesai proses simpan data
