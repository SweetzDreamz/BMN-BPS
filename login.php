<?php
session_start();
include "aksi.php"; // koneksi database
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | BMN</title>
	<link rel="icon" href="dist/img/LogoBPS.PNG">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card rounded">
			<div class="card-body login-card-body">
				<div class="login-logo">
					<a href="login.php"><b style="color:blue;">BMN</b></a>
				</div>
				<center><img src="dist/img/logo.JPEG" width="180px"><br><br></center>
				
				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username (NIP)" required>
						<div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" name="btnLogin" class="btn btn-primary btn-block">Masuk</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>

	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['btnLogin'])) {
	$username = mysqli_real_escape_string($konek, $_POST['username']);
	$password = mysqli_real_escape_string($konek, $_POST['password']);

	$sql_login = "SELECT * FROM tabel_pegawai WHERE BINARY NIP='$username' AND password='$password'";
	$query_login = mysqli_query($konek, $sql_login);
	$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);

	if ($jumlah_login == 1) {
		$_SESSION["ses_id"] = $data_login["NIP"];
		$_SESSION["ses_nama"] = $data_login["Nama"];
		$_SESSION["ses_username"] = $data_login["NIP Lama"]; // pastikan kolom ini benar
		$_SESSION["ses_level"] = $data_login["Role"];

		echo "<script>
			Swal.fire({title: 'Login Berhasil', icon: 'success', confirmButtonText: 'OK'})
			.then((result) => { if (result.value) { window.location = 'index.php'; } });
		</script>";
	} else {
		echo "<script>
			Swal.fire({title: 'Login Gagal', text: 'Username atau password salah!', icon: 'error', confirmButtonText: 'OK'})
			.then((result) => { if (result.value) { window.location = 'login.php'; } });
		</script>";
	}
}
?>
