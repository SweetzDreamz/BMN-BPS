<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Input Keluhan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">tes 1</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_dus" name="no_dus" placeholder="Tes 2"  required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">tes 2</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_map" name="no_map" placeholder="Tes 1"  required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=arsip-dus" title="Kembali" class="btn btn-secondary">Batal</a>
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
        $sql_simpan = "INSERT INTO tb_arsip_dus (no_dus, no_map) VALUES (
		'".$_POST['no_dus']."',
		'".$_POST['no_map']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=arsip-dus';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=arsip-dus';
          }
      })</script>";
    }}
     //selesai proses simpan data
