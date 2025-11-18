<?php
session_start();
include "aksi.php"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | E-Tiket BMN</title>
	<link rel="icon" href="dist/img/LogoBPS.PNG">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/adminlte.min.css">

	<script src="plugins/alert.js"></script>

<style>
	body {
		margin: 0;
		background: linear-gradient(to right, #0072ff, #00c6ff) !important;
		font-family: "Poppins", sans-serif;
		overflow-x: hidden;
	}

	.center-wrap {
		position: fixed;
		inset: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		pointer-events: none;
	}

	.login-box {
		pointer-events: auto;
		width: 400px;
	}

	.login-animate {
		animation: fadeIn 1s ease-in-out forwards;
	}

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

	.login-card-body {
		border-radius: 15px;
		box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
		padding: 35px;
		background: #fff;
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

<body>

<div class="center-wrap">
	<div class="login-box login-animate">
		<div class="card rounded">
			<div class="card-body login-card-body">
				<div class="login-logo mb-3">
					<a href="login.php"><b>E-Tiket BMN</b></a>
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

					<button type="submit" name="btnLogin" class="btn btn-primary btn-block">
						Masuk
					</button>
				</form>

			</div>
		</div>
	</div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
	const box = document.querySelector('.login-box');
	if (!box) return;

	function removeAnimateClass() {
		box.classList.remove('login-animate');
		box.removeEventListener('animationend', removeAnimateClass);
	}
	box.addEventListener('animationend', removeAnimateClass);

	const observer = new MutationObserver(function() {
		if (document.querySelector('.swal2-container')) {
			box.classList.remove('login-animate');
		}
	});
	observer.observe(document.body, { childList: true, subtree: true });
});
</script>

</body>
</html>

<?php

// ============ LOGIN PROCESS ============ //

if (isset($_POST['btnLogin'])) {
	$username = mysqli_real_escape_string($konek, $_POST['username']);
	$password = mysqli_real_escape_string($konek, $_POST['password']);

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
		$_SESSION["ses_username"] = $username;
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
