
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
    $sql_cek = "SELECT * FROM tabel_ruangan WHERE kode_ruangan='".$_GET['kode']."'";
    $query_cek = mysqli_query($konek, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Data Ruangan</h3>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Ruangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode_ruangan" value="<?php echo $data_cek['kode_ruangan']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Ruangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_ruangan" value="<?php echo $data_cek['nama_ruangan']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="keterangan_ruangan" value="<?php echo $data_cek['keterangan_ruangan']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tipe Ruangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipe_ruangan" value="<?php echo $data_cek['tipe_ruangan']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Luas Ruangan (m2)</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="luas_ruangan_m2" value="<?php echo $data_cek['luas_ruangan_m2']; ?>"/>
                </div>
            </div>

        </div>

        <div class="card-footer text-right">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
            <a href="?page=kelola_data_ruangan" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (isset($_POST['Ubah'])) {

    $sql_ubah = "UPDATE tabel_ruangan SET 
        kode_ruangan='".$_POST['kode_ruangan']."',
        nama_ruangan='".$_POST['nama_ruangan']."',
        keterangan_ruangan='".$_POST['keterangan_ruangan']."',
        tipe_ruangan='".$_POST['tipe_ruangan']."',
        luas_ruangan_m2='".$_POST['luas_ruangan_m2']."'
        WHERE kode_ruangan='".$_GET['kode']."'";

    $query_ubah = mysqli_query($konek, $sql_ubah);

    if ($query_ubah) {
        echo "
        <script>
            Swal.fire({
                title: 'Ubah Data Ruangan Berhasil',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=kelola_data_ruangan';
            });
        </script>";
    } else {
        echo "
        <script>
            Swal.fire({
                title: 'Ubah Data Ruangan Gagal',
                text: '".mysqli_real_escape_string($konek, mysqli_error($konek))."',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=kelola_data_ruangan';
            });
        </script>";
    }
}

?>
