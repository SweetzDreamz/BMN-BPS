<style>
            .card-success{
				border-radius: 12px;
			}
			.card-header {
                background: linear-gradient(135deg, #007bff, #00a0ff);
                color: white;
                border-top-left-radius: 12px;
                border-top-right-radius: 12px;
                padding: 16px 20px;
            }
            .card-footer {
                border-top: 1px solid #dee2e6;
                background-color: #f8f9fa;
                border-bottom-left-radius: 12px;
                border-bottom-right-radius: 12px;
                padding: 14px 20px;
            }

            .btn-info {
                background: linear-gradient(135deg, #007bff, #00a0ff);
                border: none;
                border-radius: 8px;
                padding: 10px 18px;
                font-weight: 500;
                transition: all 0.2s ease;
            }
            .btn-info:hover {
                transform: translateY(-2px);
                box-shadow: 0 3px 10px rgba(0, 123, 255, 0.4);
            }

            .btn-secondary {
                border-radius: 8px;
                padding: 10px 18px;
            }
</style>

<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tabel_pegawai WHERE NIP='".$_GET['kode']."'";
    $query_cek = mysqli_query($konek, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-6">
                    <input type='text' class="form-control" name="NIP" value="<?php echo $data_cek['NIP']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIP Lama</label>
                <div class="col-sm-6">
                    <input type='text' class="form-control" name="nip_lama" value="<?php echo $data_cek['NIP Lama']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" value="<?php echo $data_cek['Nama']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-6">
                    <?php
                    $jabatan = [
                        "Kepala BPS Kabupaten/Kota", "Statistisi Ahli Madya", "Kepala Subbagian Umum", "Staf Subbagian Tata Usaha",
                        "Statistisi Ahli Pertama", "Statistisi Ahli Muda", "Statistisi Penyelia", "Pranata Komputer Ahli Muda",
                        "Pelaksana", "PK APBN Terampil"
                    ];
                    ?>
                    <select name="jabatan" class="form-control">
                        <option value="">- Pilih Jabatan -</option>
                        <?php
                        foreach ($jabatan as $j) {
                            echo "<option value='$j' ".($data_cek['Jabatan']==$j?'selected':'').">$j</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Golongan Akhir</label>
                <div class="col-sm-6">
                    <?php
                    $golongan = [
                        "I/a", "I/b", "I/c", "I/d",
                        "II/a", "II/b", "II/c", "II/d",
                        "III/a", "III/b", "III/c", "III/d",
                        "IV/a", "IV/b", "IV/c", "IV/d"
                    ];
                    ?>
                    <select name="golongan_akhir" class="form-control">
                        <option value="">- Pilih Golongan -</option>
                        <?php
                        foreach ($golongan as $g) {
                            echo "<option value='$g' ".($data_cek['Golongan Akhir']==$g?'selected':'').">$g</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Email BPS</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email_bps" value="<?php echo $data_cek['Alamat Email BPS']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Email Pribadi</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email_gmail" value="<?php echo $data_cek['Alamat Gmail']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass" name="password" value="<?php echo $data_cek['Password']; ?>"/>
                    <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-6">
                    <?php
                    $roles = ["Pengurus BMN", "Kepala BPS Kabupaten/Kota", "Kasubbag", "IPDS", "Pengguna"];
                    ?>
                    <select name="role" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php
                        foreach ($roles as $r) {
                            echo "<option value='$r' ".($data_cek['Role']==$r?'selected':'').">$r</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer text-right">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
            <a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
if (isset($_POST['Ubah'])) {
    $sql_ubah = "UPDATE tabel_pegawai SET 
        `NIP`='".$_POST['NIP']."',
        `NIP Lama`='".$_POST['nip_lama']."',
        `Nama`='".$_POST['nama']."',
        `Jabatan`='".$_POST['jabatan']."',
        `Golongan Akhir`='".$_POST['golongan_akhir']."',
        `Alamat Email BPS`='".$_POST['email_bps']."',
        `Alamat Gmail`='".$_POST['email_gmail']."',
        `Password`='".$_POST['password']."',
        `Role`='".$_POST['role']."'
        WHERE `NIP`='".$_GET['kode']."'";

    $query_ubah = mysqli_query($konek, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({
            title: 'Ubah Data Berhasil',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {window.location = 'index.php?page=data-pengguna';});
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            title: 'Ubah Data Gagal',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {window.location = 'index.php?page=data-pengguna';});
        </script>";
    }
}
?>

<script type="text/javascript">
function change() {
    var x = document.getElementById('pass');
    x.type = (x.type === 'password') ? 'text' : 'password';
}
</script>
