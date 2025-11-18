<?
session_start();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

    .card.card-info {
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .card-header {
        background: linear-gradient(135deg, #007bff, #00a0ff);
        color: white;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 16px 20px;
    }

    .card-header h3 {
        font-weight: 600;
        margin: 0;
    }

    .form-group label {
        font-weight: 500;
        color: #343a40;
        margin-bottom: 6px;
        display: block;
        transition: color 0.2s ease;
    }

    .form-control,
    .select2-container--default .select2-selection--single {
        border: 1.5px solid #ced4da;
        border-radius: 8px !important;
        transition: all 0.25s ease;
        padding: 10px 12px;
        font-size: 15px;
    }
    
    .form-control:focus,
    .select2-container--default .select2-selection--single:focus,
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #007bff !important;
        box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.15);
    }

    .form-group:focus-within label {
        color: #007bff;
    }

    .form-group,
    .form-row {
        margin-bottom: 18px;
    }

    .form-check-label {
        font-weight: 500;
    }
    .form-check-input {
        transform: scale(1.2);
        margin-right: 8px;
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

    .select2-container--default .select2-selection--single {
        height: 42px !important;
        display: flex;
        align-items: center;
    }
    .select2-container--default .select2-selection__rendered {
        line-height: 30px !important;
        padding-left: 8px;
    }
    .select2-container--default .select2-selection__arrow {
        height: 40px !important;
    }

    ::placeholder {
        color: #adb5bd !important;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }
    }

    .select2-container--default .select2-selection--single {
        height: 38px !important;
        border: 1px solid #ced4da !important;
        border-radius: 0.25rem !important;
        padding: 6px 12px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 24px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px !important;
        top: 1px !important;
        right: 10px;
    }
    .select2-container { width: 100% !important; }

    .form-row { margin-bottom: 10px; }
</style>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="far fa fa-wallet"></i> Buat Tiket
        </h3>
    </div>

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="barang">Jenis Barang</label>
                        <select id="barang" name="barang" class="form-control select2" required>
                            <option value="">-- Pilih Barang --</option>
                                <?php 

                                $data = mysqli_query($konek, "
                                    SELECT b.id_barang, b.nama_barang, r.nama_ruangan
                                    FROM tabel_barang AS b
                                    LEFT JOIN tabel_ruangan AS r ON b.kode_ruangan = r.kode_ruangan
                                    ORDER BY b.nama_barang ASC
                                ");

                                while ($d = mysqli_fetch_array($data)) {
                                    $nama_ruangan = !empty($d['nama_ruangan']) ? $d['nama_ruangan'] : '-';
                                    echo '<option value="'.$d['id_barang'].'">'.$d['id_barang'].' - '.$d['nama_barang'].' - '.$nama_ruangan.'</option>';
                                }
                                ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="hasil">Hasil Pengecekan</label>
                    <textarea class="form-control" id="hasil" name="hasil" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="tindakan">Tindakan</label>
                    <textarea class="form-control" id="tindakan" name="tindakan" rows="3" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="biaya">Biaya (Rp)</label>
                        <input type="text" class="form-control" id="biaya" name="biaya" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="pihak">Pihak Yang Mengerjakan</label>
                        <input type="text" class="form-control" id="pihak" name="pihak" required>
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="form-group col-md-6">
                        <label>Paraf Pelaksana</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="✔" id="paraf_pelaksana" name="paraf_pelaksana" required>
                            <label class="form-check-label" for="paraf_pelaksana">Disetujui</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Paraf Pengurus BMN</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="✔" id="paraf_pengurus" name="paraf_pengurus" required>
                            <label class="form-check-label" for="paraf_pengurus">Disetujui</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                </div>



            <div class="card-footer text-right">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=data-pengguna" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
$(document).ready(function() {
    $('input, textarea, select').on('focus', function() {
        $(this).closest('.form-group').addClass('active-group');
    }).on('blur', function() {
        $(this).closest('.form-group').removeClass('active-group');
    });
});

<style>
.active-group label {
    color: #007bff !important;
}
</style>
</script>

<script>
$(document).ready(function() {

    $('.select2').select2({
        allowClear: true,
        width: 'resolve'
    });


    $('#biaya').on('input', function() {

        var angka = $(this).val().replace(/[^0-9]/g, '');

        var formatted = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        $(this).val(formatted);
    });
});
</script>

<?php
if (isset($_POST['Simpan'])) {
    if (session_status() == PHP_SESSION_NONE) session_start();
    $nip = $_SESSION['ses_id'];

    $id_barang = mysqli_real_escape_string($konek, $_POST['barang']);
    $tanggal = mysqli_real_escape_string($konek, $_POST['tanggal']);
    $keluhan = mysqli_real_escape_string($konek, $_POST['keluhan']);
    $hasil = mysqli_real_escape_string($konek, $_POST['hasil']);
    $tindakan = mysqli_real_escape_string($konek, $_POST['tindakan']);
    $biaya_raw = preg_replace('/[^0-9]/', '', str_replace('.', '', $_POST['biaya']));
    $biaya = ($biaya_raw === '') ? 0 : $biaya_raw;
    $pihak = mysqli_real_escape_string($konek, $_POST['pihak']);
    $paraf_pelaksana = isset($_POST['paraf_pelaksana']) ? '✔' : '';
    $paraf_pengurus = isset($_POST['paraf_pengurus']) ? '✔' : '';
    $keterangan = mysqli_real_escape_string($konek, $_POST['keterangan']);

    $id_status = 3;

    $sql_simpan = "INSERT INTO tabel_tiket 
        (id_barang, NIP, tanggal, keluhan, hasil_pengecekan, tindakan, biaya, pihak_mengerjakan, paraf_pelaksana, paraf_pengurus, keterangan, id_status)
        VALUES (
            '$id_barang',
            '$nip',
            '$tanggal',
            '$keluhan',
            '$hasil',
            '$tindakan',
            '$biaya',
            '$pihak',
            '$paraf_pelaksana',
            '$paraf_pengurus',
            '$keterangan',
            '$id_status'
        )";

    $query_simpan = mysqli_query($konek, $sql_simpan);

if ($query_simpan) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Tiket Berhasil Dibuat!',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'index.php?page=lihat_tiket_keluhan';
        });
    });
    </script>";
} else {
    $err = addslashes(mysqli_error($konek));
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Tiket Gagal Dibuat',
            text: '{$err}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
    </script>";
}



}
?>


