<?php
session_start();
include "aksi.php"; 
?>
<!DOCTYPE html>
<html lang="id">
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

	<style>

		body {
			height: 100vh;
			margin: 0;
			background: #009bff !important;
			background: -webkit-linear-gradient(left, #0072ff, #00c6ff) !important;
			background: -o-linear-gradient(left, #0072ff, #00c6ff) !important;
			background: -moz-linear-gradient(left, #0072ff, #00c6ff) !important;
			background: linear-gradient(to right, #0072ff, #00c6ff) !important;
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: "Poppins", sans-serif;
		}

		/* === LOGIN BOX === */
		.login-box {
			width: 400px;
			animation: fadeIn 1.2s ease-in-out;
		}

		/* === ANIMASI FADE-IN === */
		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(-20px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		/* === CARD STYLE === */
		.login-card-body {
			border-radius: 15px;
			box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
			padding: 35px;
			background: #fff;
		}

		.login-logo a {
			font-size: 2rem;
			font-weight: bold;
			color: #0072ff;
			text-decoration: none;
		}

		.login-logo a:hover {
			color: #0056b3;
		}

		input.form-control {
			border-radius: 8px;
		}

		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
			transition: all 0.3s ease;
			border-radius: 8px;
		}

		.btn-primary:hover {
			background-color: #0056b3;
			transform: translateY(-1px);
		}
	</style>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card rounded">
			<div class="card-body login-card-body">
				<div class="login-logo mb-3">
					<a href="login.php"><b>BMN</b></a>
				</div>
				<center>
					<img src="dist/img/logo.JPEG" width="160px" style="margin-bottom: 15px;">
				</center>

				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="NIP / NIP Lama" required>
						<div class="input-group-append">
							<div class="input-group-text"><span class="fas fa-user"></span></div>
						</div>
					</div>

					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text"><span class="fas fa-lock"></span></div>
						</div>
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

	// Cek apakah username cocok dengan NIP atau NIP Lama
	$sql_login = "
		SELECT * FROM tabel_pegawai 
		WHERE (BINARY NIP = '$username' OR BINARY `NIP Lama` = '$username') 
		AND password = '$password'
	";
	$query_login = mysqli_query($konek, $sql_login);
	$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);

	if ($jumlah_login == 1) {
		$_SESSION["ses_id"] = $data_login["NIP"];
		$_SESSION["ses_nama"] = $data_login["Nama"];
		$_SESSION["ses_username"] = $username; // bisa NIP atau NIP Lama
		$_SESSION["ses_level"] = $data_login["Role"];

		echo "<script>
			Swal.fire({
				title: 'Login Berhasil',
				icon: 'success',
				confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) { window.location = 'index.php'; }
			});
		</script>";
	} else {
		echo "<script>
			Swal.fire({
				title: 'Login Gagal',
				text: 'NIP, NIP Lama, atau password salah!',
				icon: 'error',
				confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) { window.location = 'login.php'; }
			});
		</script>";
	}
}
?>

