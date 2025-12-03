<style>
    .card-success {
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
if (!isset($_GET['kode'])) {
    echo "<script>alert('Tidak ada tiket dipilih.'); window.location='index.php?page=lihat_tiket_keluhan';</script>";
    exit;
}

$kode = mysqli_real_escape_string($konek, $_GET['kode']);

$sql_cek = "
    SELECT t.*, s.keterangan_status, b.nama_barang, p.Nama AS nama_pegawai
    FROM tabel_tiket t
    LEFT JOIN status s ON t.id_status = s.id_status
    LEFT JOIN tabel_barang b ON t.id_barang = b.id_barang
    LEFT JOIN tabel_pegawai p ON t.NIP = p.NIP
    WHERE t.kode_ticket = '$kode'
    LIMIT 1
";
$query_cek = mysqli_query($konek, $sql_cek);
if (!$query_cek || mysqli_num_rows($query_cek) == 0) {
    echo "<script>alert('Tiket tidak ditemukan.'); window.location='index.php?page=lihat_tiket_keluhan';</script>";
    exit;
}
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC);

// Ambil daftar status untuk select
$status_q = mysqli_query($konek, "SELECT * FROM status ORDER BY id_status");
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Proses Tiket (#<?php echo $data_cek['kode_ticket']; ?>)</h3>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Ticket</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode_ticket" value="<?php echo $data_cek['kode_ticket']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_barang" value="<?php echo htmlspecialchars($data_cek['id_barang']); ?>">
                    <?php if (!empty($data_cek['nama_barang'])) { ?>
                        <small class="form-text text-muted">Nama barang: <?php echo htmlspecialchars($data_cek['nama_barang']); ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pelapor (NIP)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="NIP" value="<?php echo htmlspecialchars($data_cek['NIP']); ?>">
                    <?php if (!empty($data_cek['nama_pegawai'])) { ?>
                        <small class="form-text text-muted">Nama: <?php echo htmlspecialchars($data_cek['nama_pegawai']); ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal" value="<?php echo $data_cek['tanggal']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-6">
                    <select class="form-control" name="id_status" required>
                        <option value="">-- Pilih Status --</option>
                        <?php
                        while ($st = mysqli_fetch_assoc($status_q)) {
                            $sel = ($st['id_status'] == $data_cek['id_status']) ? "selected" : "";
                            echo "<option value=\"".intval($st['id_status'])."\" $sel>".htmlspecialchars($st['keterangan_status'])."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keluhan</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="keluhan" rows="4"><?php echo htmlspecialchars($data_cek['keluhan']); ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Hasil Pengecekan</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="hasil_pengecekan" rows="3"><?php echo htmlspecialchars($data_cek['hasil_pengecekan']); ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tindakan</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="tindakan" rows="3"><?php echo htmlspecialchars($data_cek['tindakan']); ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Biaya</label>
                <div class="col-sm-6">
                    <input type="number" step="0.01" class="form-control" name="biaya" value="<?php echo htmlspecialchars($data_cek['biaya']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pihak Mengerjakan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pihak_mengerjakan" value="<?php echo htmlspecialchars($data_cek['pihak_mengerjakan']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Paraf Pelaksana</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="paraf_pelaksana" value="<?php echo htmlspecialchars($data_cek['paraf_pelaksana']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Paraf Pengurus</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="paraf_pengurus" value="<?php echo htmlspecialchars($data_cek['paraf_pengurus']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="keterangan" rows="2"><?php echo htmlspecialchars($data_cek['keterangan']); ?></textarea>
                </div>
            </div>

        </div>

        <div class="card-footer text-right">
            <input type="submit" name="Ubah" value="Simpan Perubahan" class="btn btn-info">
            <a href="index.php?page=lihat_tiket_keluhan" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (isset($_POST['Ubah'])) {
    // Ambil input dan escape
    $id_barang = mysqli_real_escape_string($konek, $_POST['id_barang']);
    $NIP = mysqli_real_escape_string($konek, $_POST['NIP']);
    $tanggal = mysqli_real_escape_string($konek, $_POST['tanggal']);
    $id_status = intval($_POST['id_status']);
    $keluhan = mysqli_real_escape_string($konek, $_POST['keluhan']);
    $hasil_pengecekan = mysqli_real_escape_string($konek, $_POST['hasil_pengecekan']);
    $tindakan = mysqli_real_escape_string($konek, $_POST['tindakan']);
    $biaya = ($_POST['biaya'] === '' ? "NULL" : "'" . mysqli_real_escape_string($konek, $_POST['biaya']) . "'");
    $pihak_mengerjakan = mysqli_real_escape_string($konek, $_POST['pihak_mengerjakan']);
    $paraf_pelaksana = mysqli_real_escape_string($konek, $_POST['paraf_pelaksana']);
    $paraf_pengurus = mysqli_real_escape_string($konek, $_POST['paraf_pengurus']);
    $keterangan = mysqli_real_escape_string($konek, $_POST['keterangan']);

    $sql_ubah = "
        UPDATE tabel_tiket SET
            id_barang = '$id_barang',
            NIP = '$NIP',
            id_status = $id_status,
            tanggal = " . ($tanggal=='' ? "NULL" : "'$tanggal'") . ",
            keluhan = '$keluhan',
            hasil_pengecekan = '$hasil_pengecekan',
            tindakan = '$tindakan',
            biaya = $biaya,
            pihak_mengerjakan = '$pihak_mengerjakan',
            paraf_pelaksana = '$paraf_pelaksana',
            paraf_pengurus = '$paraf_pengurus',
            keterangan = '$keterangan'
        WHERE kode_ticket = '$kode'
    ";

    $query_ubah = mysqli_query($konek, $sql_ubah);

    if ($query_ubah) {
        echo "
        <script>
            Swal.fire({
                title: 'Tiket diperbarui',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=lihat_tiket_keluhan';
            });
        </script>";
    } else {
        $err = mysqli_real_escape_string($konek, mysqli_error($konek));
        echo "
        <script>
            Swal.fire({
                title: 'Gagal memperbarui tiket',
                text: '". $err ."',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}
?>
