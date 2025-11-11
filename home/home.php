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

// =============== PERHITUNGAN UNTUK SEMUA USER =============== //

// Jumlah semua tiket (tanpa batas waktu)
$sql_tiket = mysqli_query($konek, "
    SELECT COUNT(*) AS jumlah_tiket 
    FROM tabel_tiket
");
$data_tiket = mysqli_fetch_array($sql_tiket);
$jumlah_tiket = $data_tiket['jumlah_tiket'];

// Tiket diterima
$sql_diterima = mysqli_query($konek, "
    SELECT COUNT(*) AS total_diterima 
    FROM tabel_tiket 
    WHERE id_status = 1
");
$data_diterima = mysqli_fetch_array($sql_diterima);

// Tiket ditolak
$sql_ditolak = mysqli_query($konek, "
    SELECT COUNT(*) AS total_ditolak 
    FROM tabel_tiket 
    WHERE id_status = 2
");
$data_ditolak = mysqli_fetch_array($sql_ditolak);

// Tiket dalam pengerjaan
$sql_dalam_pengerjaan = mysqli_query($konek, "
    SELECT COUNT(*) AS total_proses 
    FROM tabel_tiket 
    WHERE id_status = 3
");
$data_proses = mysqli_fetch_array($sql_dalam_pengerjaan);

?>

<!-- ====== Halaman Home User ====== -->
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
                        <h3><?php echo $jumlah_tiket; ?></h3>
                        <p>Total Tiket</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <a href="?page=lihat_tiket_keluhan" class="small-box-footer">
                        Lihat Semua Tiket <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Tiket Diterima -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $data_diterima['total_diterima']; ?></h3>
                        <p>Tiket Diterima</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <a href="?page=lihat_tiket_keluhan" class="small-box-footer">
                        Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Tiket Ditolak -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $data_ditolak['total_ditolak']; ?></h3>
                        <p>Tiket Ditolak</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <a href="?page=lihat_tiket_keluhan" class="small-box-footer">
                        Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Tiket Dalam Pengerjaan -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $data_proses['total_proses']; ?></h3>
                        <p>Tiket Dalam Pengerjaan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <a href="?page=lihat_tiket_keluhan" class="small-box-footer">
                        Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <?php

            // Bulan yang dipilih (default: bulan ini)
            $selected_month = isset($_GET['bulan']) ? $_GET['bulan'] : date('Y-m');
            // Ambil tahun saat ini dari bulan terpilih
            $tahun_ini = date('Y', strtotime($selected_month . "-01"));

            // Buat daftar seluruh bulan (1–12)
            $bulan_list = [];
            for ($i = 1; $i <= 12; $i++) {
                $bulan_list[] = [
                    'value' => $tahun_ini . '-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    'nama' => date("F Y", strtotime($tahun_ini . '-' . $i . '-01'))
                ];
            }



            // Ambil data per status untuk bulan terpilih
            $sql_status = mysqli_query($konek, "
                SELECT 
                    SUM(CASE WHEN id_status = 1 THEN 1 ELSE 0 END) AS diterima,
                    SUM(CASE WHEN id_status = 2 THEN 1 ELSE 0 END) AS ditolak,
                    SUM(CASE WHEN id_status = 3 THEN 1 ELSE 0 END) AS proses
                FROM tabel_tiket
                WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$selected_month'
            ");
            $data_status = mysqli_fetch_assoc($sql_status);

            // Pastikan tidak null
            $diterima = $data_status['diterima'] ?? 0;
            $ditolak = $data_status['ditolak'] ?? 0;
            $proses = $data_status['proses'] ?? 0;
            ?>

            <!-- ====== Bagian Statistik Tiket per Bulan ====== -->
            <div class="row mt-2">
                <!-- Kartu Statistik -->
                <div class="col-lg-8 col-12 me-lg-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                            <h5 class="mb-2 mb-md-0" style="font-size:16px;">
                                <i class="fas fa-chart-bar"></i> Statistik Tiket Keluhan — 
                                <span class="text-primary">
                                    <?php echo date("F Y", strtotime($selected_month . "-01")); ?>
                                </span>
                            </h5>

                            <!-- Filter Bulan -->
                            <form method="get" class="form-inline filter-bulan">
                                <input type="hidden" name="page" value="arsip-home">
                                <select name="bulan" class="form-control form-control-sm" style="font-size:13px;" onchange="this.form.submit()">
                                    <?php foreach ($bulan_list as $b) { ?>
                                        <option value="<?php echo $b['value']; ?>" 
                                            <?php echo ($b['value'] == $selected_month) ? 'selected' : ''; ?>>
                                            <?php echo $b['nama']; ?>
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

            <?php
            // --- Pastikan $selected_month sudah ada (ambil default bulan ini jika belum) ---
            $selected_month = $selected_month ?? (isset($_GET['bulan']) ? $_GET['bulan'] : date('Y-m'));

            // Ambil tahun yang sedang dipilih (aman)
            $selected_year = date('Y', strtotime($selected_month . "-01"));

            // Hitung total tiket tahun ini (aman dengan fallback 0)
            $total_tahun_ini = 0;
            $sql_total_tahun_ini = mysqli_query($konek, "
                SELECT COUNT(*) AS total_tahun_ini 
                FROM tabel_tiket 
                WHERE YEAR(tanggal) = '". mysqli_real_escape_string($konek, $selected_year) ."'
            ");
            if ($sql_total_tahun_ini && mysqli_num_rows($sql_total_tahun_ini) > 0) {
                $tmp = mysqli_fetch_assoc($sql_total_tahun_ini);
                $total_tahun_ini = isset($tmp['total_tahun_ini']) ? (int)$tmp['total_tahun_ini'] : 0;
            }

            // Hitung total tiket tahun sebelumnya
            $tahun_sebelumnya = (int)$selected_year - 1;
            $total_tahun_lalu = 0;
            $sql_total_tahun_lalu = mysqli_query($konek, "
                SELECT COUNT(*) AS total_tahun_lalu 
                FROM tabel_tiket 
                WHERE YEAR(tanggal) = '". mysqli_real_escape_string($konek, $tahun_sebelumnya) ."'
            ");
            if ($sql_total_tahun_lalu && mysqli_num_rows($sql_total_tahun_lalu) > 0) {
                $tmp2 = mysqli_fetch_assoc($sql_total_tahun_lalu);
                $total_tahun_lalu = isset($tmp2['total_tahun_lalu']) ? (int)$tmp2['total_tahun_lalu'] : 0;
            }

            // Selisih dan kelas warna/ikon
            $selisih = $total_tahun_ini - $total_tahun_lalu;
            $warna_selisih = ($selisih >= 0) ? 'text-success' : 'text-danger';
            $ikon_selisih = ($selisih >= 0) ? '<i class="fas fa-arrow-up"></i>' : '<i class="fas fa-arrow-down"></i>';
            ?>


            <!-- Kartu Ringkasan Tahunan -->
            <div class="col-lg-4 col-12 ms-lg-3 mt-2 mt-lg-0">
                <div class="card shadow-sm ringkasan-tahunan text-center h-100">
                    <div class="card-body">
                        <h6 class="fw-bold mb-2">Jumlah Tiket Tahun <?php echo $selected_year; ?></h6>
                        <h2 class="mb-0"><?php echo $total_tahun_ini; ?></h2>
                        <small class="text-muted">Total Tiket Masuk Tahun Ini</small>
                        <hr>
                        <p class="mb-2">Perbandingan dengan Tahun <?php echo $tahun_sebelumnya; ?>:</p>
                        <?php if ($selisih != 0) { ?>
                            <p class="mb-0 <?php echo $warna_selisih; ?>">
                                <?php echo $ikon_selisih; ?> 
                                <?php echo abs($selisih); ?> tiket 
                                <?php echo ($selisih >= 0) ? 'lebih banyak' : 'lebih sedikit'; ?>
                            </p>
                        <?php } else { ?>
                            <p class="text-secondary mb-0">Tidak ada perubahan dari tahun lalu</p>
                        <?php } ?>
                        <hr>
                        <p class="text-muted" style="font-size:13px;">
                            <i class="fas fa-info-circle"></i> Statistik ini menampilkan total tiket per tahun 
                            <br>(termasuk semua status tiket)
                        </p>
                    </div>
                </div>
            </div>
        </div>

            <!-- ==== CSS tambahan agar layout rapi ==== -->
            <style>
            /* Posisi filter bulan */
            .filter-bulan {
                margin-left: auto;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .filter-bulan select {
                min-width: 160px;
            }

            /* Responsif untuk layar kecil */
            @media (max-width: 768px) {
                .filter-bulan {
                    width: 100%;
                    justify-content: flex-start;
                    margin-top: 8px;
                }
            }

            /* Gaya umum card */
            .card {
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            </style>


            <style>

            /* Pastikan card bawah sejajar dengan card atas */
            .small-box {
                min-height: 140px;
            }

            /* Menjaga proporsi dan jarak antar card */
            .row.mt-4.g-3 > div {
                display: flex;
                flex-direction: column;
            }

            /* Tinggi seragam untuk card statistik dan ringkasan */
            .card.h-100 {
                min-height: 300px;
            }

            /* Tampilan card lebih lembut */
            .card {
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            /* Tambahkan konsistensi spacing */
            .container-fluid .row {
                margin-bottom: 10px;
            }

            .table-hover tbody tr:hover {
                background-color: #f8f9fa;
                cursor: pointer;
                transition: background-color 0.2s ease-in-out;
            }

            .table thead th {
                font-size: 14px;
                font-weight: 600;
            }

            .table tbody td {
                font-size: 14px;
                vertical-align: middle;
            }
            </style>


            <!-- ====== Script Chart.js ====== -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
            const ctx = document.getElementById('chartStatusTiket').getContext('2d');
            const chartStatusTiket = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Diterima', 'Ditolak', 'Dalam Pengerjaan'],
                    datasets: [{
                        label: 'Jumlah Tiket',
                        data: [<?php echo $diterima; ?>, <?php echo $ditolak; ?>, <?php echo $proses; ?>],
                        backgroundColor: [
                            'rgba(40, 167, 69, 0.8)',   // Hijau
                            'rgba(220, 53, 69, 0.8)',   // Merah
                            'rgba(255, 193, 7, 0.8)'    // Kuning
                        ],
                        borderColor: [
                            'rgba(40, 167, 69, 1)',
                            'rgba(220, 53, 69, 1)',
                            'rgba(255, 193, 7, 1)'
                        ],
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true, ticks: { precision: 0 } }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.parsed.y + ' tiket';
                                }
                            }
                        }
                    }
                }
            });
            </script>

            <style>

            /* Tambahkan jarak antar card dan gaya lembut */
            .card {
                border-radius: 10px;
            }
            .row.mt-4 > .col-lg-8 {
                padding-right: 15px;
            }
            .row.mt-4 > .col-lg-4 {
                padding-left: 15px;
            }
            
            </style>
        </div>
    </div>
</section>
