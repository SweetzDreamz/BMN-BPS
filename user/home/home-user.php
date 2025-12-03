<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "aksi.php"; 
if (!isset($_SESSION['ses_id'])) {
    echo "<script>
    alert('Silakan login terlebih dahulu!');
    window.location = 'login.php';
    </script>";
    exit;
}

// =============== PERHITUNGAN TIKET =============== //

// Ambil data sesi
$nip = $_SESSION['ses_id'];
$level = $_SESSION['ses_level'];

// Jika admin, tampilkan semua tiket
if ($level == 'Admin' || $level == 'admin') {
    $where_clause = "";
} else {
    $where_clause = "WHERE NIP = '$nip'";
}

// Total tiket
$sql_tiket = mysqli_query($konek, "
    SELECT COUNT(*) AS jumlah_tiket 
    FROM tabel_tiket
    $where_clause
");
$data_tiket = mysqli_fetch_array($sql_tiket);
$jumlah_tiket = $data_tiket['jumlah_tiket'];

// Tiket diterima
$sql_diterima = mysqli_query($konek, "
    SELECT COUNT(*) AS total_diterima 
    FROM tabel_tiket 
    WHERE id_status = 1
    " . (($level != 'Admin' && $level != 'admin') ? "AND NIP = '$nip'" : "")
);
$data_diterima = mysqli_fetch_array($sql_diterima);

// Tiket ditolak
$sql_ditolak = mysqli_query($konek, "
    SELECT COUNT(*) AS total_ditolak 
    FROM tabel_tiket 
    WHERE id_status = 2
    " . (($level != 'Admin' && $level != 'admin') ? "AND NIP = '$nip'" : "")
);
$data_ditolak = mysqli_fetch_array($sql_ditolak);

// Tiket dalam pengerjaan
$sql_dalam_pengerjaan = mysqli_query($konek, "
    SELECT COUNT(*) AS total_proses 
    FROM tabel_tiket 
    WHERE id_status = 3
    " . (($level != 'Admin' && $level != 'admin') ? "AND NIP = '$nip'" : "")
);
$data_proses = mysqli_fetch_array($sql_dalam_pengerjaan);


// ===================== FILTER TAHUN BARU ====================== //

$selected_year = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

// daftar tahun dari 2020 - tahun sekarang
$tahun_list = [];
$current_year = date('Y');
for ($y = 2024; $y <= $current_year; $y++) {
    $tahun_list[] = $y;
}

// Query tiket per bulan
$sql_bulanan = mysqli_query($konek, "
    SELECT 
        MONTH(tanggal) AS bulan,
        SUM(CASE WHEN id_status = 1 THEN 1 ELSE 0 END) AS diterima,
        SUM(CASE WHEN id_status = 2 THEN 1 ELSE 0 END) AS ditolak,
        SUM(CASE WHEN id_status = 3 THEN 1 ELSE 0 END) AS proses
    FROM tabel_tiket
    WHERE YEAR(tanggal) = '$selected_year'
    GROUP BY MONTH(tanggal)
    ORDER BY bulan
");

// Inisialisasi array bulan
$data_diterima_bln = array_fill(1, 12, 0);
$data_ditolak_bln  = array_fill(1, 12, 0);
$data_proses_bln   = array_fill(1, 12, 0);

while ($row = mysqli_fetch_assoc($sql_bulanan)) {
    $b = (int)$row['bulan'];
    $data_diterima_bln[$b] = $row['diterima'];
    $data_ditolak_bln[$b]  = $row['ditolak'];
    $data_proses_bln[$b]   = $row['proses'];
}

?>


<!-- ====== Halaman Dashboard ====== -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0"><i class="fas fa-home"></i> Dashboard</h4>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">
<div class="row">

    <!-- Total Tiket -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $jumlah_tiket ?></h3>
                <p>Total Tiket</p>
            </div>
            <div class="icon"><i class="fas fa-ticket-alt"></i></div>
                <?php 
                    $page_link = ($level == 'Pengurus BMN') 
                        ? 'lihat_tiket_keluhan'
                        : 'user-lihat_tiket_keluhan';
                ?>
                <a href="?page=<?= $page_link ?>" class="small-box-footer">
                    Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
        </div>
    </div>

    <!-- Tiket Diterima -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $data_diterima['total_diterima'] ?></h3>
                <p>Tiket Diterima</p>
            </div>
            <div class="icon"><i class="fas fa-check-circle"></i></div>
            <a href="?page=lihat_tiket_keluhan" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Tiket Ditolak -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $data_ditolak['total_ditolak'] ?></h3>
                <p>Tiket Ditolak</p>
            </div>
            <div class="icon"><i class="fas fa-times-circle"></i></div>
            <a href="?page=lihat_tiket_keluhan" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Tiket Dalam Proses -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $data_proses['total_proses'] ?></h3>
                <p>Dalam Pengerjaan</p>
            </div>
            <div class="icon"><i class="fas fa-spinner"></i></div>
            <a href="?page=lihat_tiket_keluhan" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>


<!-- ==================== Grafik Time Series ==================== -->
<div class="row mt-3">
    <div class="col-lg-8 col-12">
        <div class="card shadow-sm h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-chart-line"></i> Statistik Tiket Keluhan Tahun 
                    <span class="text-primary"><?= $selected_year ?></span>
                </h5>

                <form method="get">
                    <input type="hidden" name="page" value="arsip-home">
                    <select name="tahun" class="form-control form-control-sm" onchange="this.form.submit()">
                        <?php foreach ($tahun_list as $th) { ?>
                            <option value="<?= $th ?>" <?= ($th == $selected_year ? 'selected' : '') ?>>
                                <?= $th ?>
                            </option>
                        <?php } ?>
                    </select>
                </form>
            </div>

            <div class="card-body">
                <canvas id="chartStatusTiket" height="130"></canvas>
            </div>
        </div>
    </div>


    <!-- Ringkasan Total Tahunan -->
    <?php
        // total tahun ini
        $sql_total_tahun = mysqli_query($konek, "
            SELECT COUNT(*) AS total_tahun 
            FROM tabel_tiket
            WHERE YEAR(tanggal) = '$selected_year'
        ");
        $total_this_year = mysqli_fetch_assoc($sql_total_tahun)['total_tahun'] ?? 0;

        // tahun sebelumnya
        $prev_year = $selected_year - 1;
        $sql_total_prev = mysqli_query($konek, "
            SELECT COUNT(*) AS total_tahun 
            FROM tabel_tiket
            WHERE YEAR(tanggal) = '$prev_year'
        ");
        $total_prev_year = mysqli_fetch_assoc($sql_total_prev)['total_tahun'] ?? 0;

        $selisih = $total_this_year - $total_prev_year;
        $kelas = $selisih >= 0 ? 'text-success' : 'text-danger';
        $ikon  = $selisih >= 0 ? 'fa-arrow-up' : 'fa-arrow-down';
    ?>

    <div class="col-lg-4 col-12 mt-3 mt-lg-0">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h6 class="fw-bold mb-2">Jumlah Tiket Tahun <?= $selected_year ?></h6>
                <h2><?= $total_this_year ?></h2>
                <small class="text-muted">Total Tiket Masuk</small>

                <hr>

                <p class="mb-1">Perbandingan dgn <?= $prev_year ?>:</p>

                <?php if ($selisih == 0) { ?>
                    <p class="text-secondary mb-0">Tidak ada perubahan</p>
                <?php } else { ?>
                    <p class="<?= $kelas ?>">
                        <i class="fas <?= $ikon ?>"></i>
                        <?= abs($selisih) ?> tiket 
                        <?= ($selisih >= 0 ? "lebih banyak" : "lebih sedikit") ?>
                    </p>
                <?php } ?>

                <hr>
                <p class="text-muted" style="font-size:13px;">
                    <i class="fas fa-info-circle"></i>
                    Statistik total tiket per tahun
                </p>
            </div>
        </div>
    </div>

</div>
</div>
</section>


<!-- ==================== SCRIPT GRAFIK ==================== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartStatusTiket').getContext('2d');

new Chart(ctx, {
    type: 'line', 
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets: [
            {
                label: 'Diterima',
                data: <?= json_encode(array_values($data_diterima_bln)); ?>,
                borderWidth: 2,
                borderColor: '#ff6384',   // Merah seperti contoh
                backgroundColor: '#ff6384',
                tension: 0,                // GARIS LURUS
                pointRadius: 5,            // TITIK BESAR
                pointHoverRadius: 7,
                fill: false                // TANPA AREA
            },
            {
                label: 'Ditolak',
                data: <?= json_encode(array_values($data_ditolak_bln)); ?>,
                borderWidth: 2,
                borderColor: '#36a2eb',   // Biru seperti contoh
                backgroundColor: '#36a2eb',
                tension: 0,
                pointRadius: 5,
                pointHoverRadius: 7,
                fill: false
            },
            {
                label: 'Dalam Pengerjaan',
                data: <?= json_encode(array_values($data_proses_bln)); ?>,
                borderWidth: 2,
                borderColor: '#ffcd56',
                backgroundColor: '#ffcd56',
                tension: 0,
                pointRadius: 5,
                pointHoverRadius: 7,
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            tooltip: {
                callbacks: {
                    label: (ctx) => ` ${ctx.parsed.y} tiket`
                }
            },
            legend: {
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: (value) => value.toFixed(0)
                }
            }
        }
    }
});
</script>


