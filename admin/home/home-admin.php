<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include "aksi.php";

// ================ SECURITY CHECK ================
$level = strtolower($_SESSION['ses_level']);

if (!in_array($level, ['admin', 'pengurus bmn'])) {
    echo "<script>alert('Akses ditolak! Halaman khusus admin.'); window.location='login.php';</script>";
    exit;
}


// ================== YEAR FILTER ===================
$selected_year = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

// Tahun untuk dropdown
$tahun_list = [];
for ($y = 2024; $y <= date('Y'); $y++) {
    $tahun_list[] = $y;
}

// ================== STATISTIK KARTU ===============

// Total Tiket
$total_tiket = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_tiket
"))['total'];

// Tiket Diterima
$total_diterima = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_tiket WHERE id_status = 1
"))['total'];

// Tiket Ditolak
$total_ditolak = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_tiket WHERE id_status = 2
"))['total'];

// Dalam Pengerjaan
$total_proses = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_tiket WHERE id_status = 3
"))['total'];

// ================== TOTAL BMN, PEGAWAI, RUANGAN ===================
$total_bmn = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_barang
"))['total'];

$total_pegawai = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_pegawai
"))['total'];

$total_ruangan = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_ruangan
"))['total'];


// ================= NOTIFIKASI TIKET BARU =================
$notif_baru = mysqli_fetch_assoc(mysqli_query($konek, "
    SELECT COUNT(*) AS total FROM tabel_tiket WHERE id_status = 3
"))['total'];

// ================== GRAFIK =========================
$sql_grafik = mysqli_query($konek, "
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

$data_diterima = array_fill(1, 12, 0);
$data_ditolak  = array_fill(1, 12, 0);
$data_proses   = array_fill(1, 12, 0);

while ($row = mysqli_fetch_assoc($sql_grafik)) {
    $b = $row['bulan'];
    $data_diterima[$b] = $row['diterima'];
    $data_ditolak[$b]  = $row['ditolak'];
    $data_proses[$b]   = $row['proses'];
}

// ================== FILTER ANALISIS ===================
$filter_status   = isset($_GET['status']) ? $_GET['status'] : '';
$filter_unit     = isset($_GET['unit']) ? $_GET['unit'] : '';
$filter_bulan    = isset($_GET['bulan']) ? $_GET['bulan'] : '';
$filter_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// ================== TIKET TERBARU ====================
$query_latest = mysqli_query($konek, "
    SELECT t.*, u.NIP, u.Nama 
    FROM tabel_tiket t
    LEFT JOIN tabel_pegawai u ON u.NIP = t.NIP
    ORDER BY t.kode_ticket DESC
    LIMIT 8
");
?>

<!-- ===================== DASHBOARD ===================== -->
<div class="content-header">
    <h4 class="m-0"><i class="fas fa-home"></i> Dashboard Admin</h4>
</div>

<section class="content">
<div class="container-fluid">

<!-- NOTIFIKASI -->
<?php if ($notif_baru > 0) { ?>
<div class="alert alert-danger d-flex justify-content-between align-items-center">
    
    <div>
        <b>
            <i class="fas fa-bell"></i> 
            Ada <?= $notif_baru ?> tiket baru menunggu tindakan!
        </b>
    </div>

    <a href="?page=lihat_tiket_keluhan" 
       class="btn btn-danger btn-sm" 
       style="font-weight:bold;">
        Lihat <i class="fas fa-arrow-right"></i>
    </a>

</div>
<?php } ?>

<!-- ================= KARTU STATISTIK ================= -->
<div class="row">

<?php
$cards = [
    [
        'title' => 'Total Tiket',
        'value' => $total_tiket,
        'color' => 'bg-primary',
        'icon'  => 'fa-ticket-alt',
        'url'   => '?page=lihat_tiket_keluhan'
    ],
    [
        'title' => 'Total Pengguna',
        'value' => $total_pegawai,
        'color' => 'bg-success',
        'icon'  => 'fa-users',
        'url'   => '?page=data-pengguna'
    ],
    [
        'title' => 'Total Barang (BMN)',
        'value' => $total_bmn,
        'color' => 'bg-danger',
        'icon'  => 'fa-box',
        'url'   => '?page=kelola_data_bmn'
    ],
    [
        'title' => 'Total Ruangan',
        'value' => $total_ruangan,
        'color' => 'bg-warning',
        'icon'  => 'fa-building',
        'url'   => '?page=kelola_data_ruangan'
    ]
];

foreach ($cards as $c) { ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?= $c['color'] ?>">
            <div class="inner">
                <h3><?= $c['value'] ?></h3>
                <p><?= $c['title'] ?></p>
            </div>

            <div class="icon">
                <i class="fas <?= $c['icon'] ?>"></i>
            </div>

            <a href="<?= $c['url'] ?>" 
               class="small-box-footer text-white" 
               style="font-weight: bold;">
                Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
<?php } ?>

</div>





<!-- ================= GRAFIK + KARTU BMN/PEGAWAI/RUANGAN ================= -->
<div class="row mt-3">

    <!-- Grafik -->
    <div class="col-lg-9">
        <div class="card">
            
            <div class="card-header border-0 d-flex align-items-center">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i> 
                    Statistik Tiket Tahun <?= $selected_year ?>
                </h3>

                <div class="card-tools ml-auto">
                    <form method="get" class="form-inline">
                        <input type="hidden" name="page" value="home-admin">
                        <select name="tahun" class="form-control form-control-sm" onchange="this.form.submit()">
                            <?php foreach ($tahun_list as $th) { ?>
                                <option value="<?= $th ?>" <?= ($th == $selected_year ? 'selected' : '') ?>><?= $th ?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartStatus" height="120"></canvas>
            </div>
        </div>
    </div>

    <!-- PIE CHART TIKET BERDASARKAN RUANGAN -->
    <div class="col-lg-3">
        <div class="card h-100">
            <div class="card-header text-center">
                <h5><i class="fas fa-chart-pie"></i> Tiket per Ruangan</h5>
            </div>
            <div class="card-body">
                <canvas id="pieRuangan" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<?php
    $sql_ruangan = mysqli_query($konek, "
    SELECT 
        r.nama_ruangan,
        COUNT(t.kode_ticket) AS total_tiket
    FROM tabel_tiket t
    JOIN tabel_barang b ON t.id_barang = b.id_barang
    JOIN tabel_ruangan r ON b.kode_ruangan = r.kode_ruangan
    GROUP BY r.nama_ruangan
    ORDER BY total_tiket DESC;

    ");

    $ruangan_labels = [];
    $ruangan_values = [];

    while ($row = mysqli_fetch_assoc($sql_ruangan)) {
        $ruangan_labels[] = $row['nama_ruangan'];
        $ruangan_values[] = (int)$row['total_tiket'];
    }
?>

<!-- =============== TIKET TERBARU =============== -->
<div class="card mt-3">
    <div class="card-header">
        <h5><i class="fas fa-clock"></i> Tiket Terbaru</h5>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No Tiket</th>
                    <th>Pengaju</th>
                    <th>Unit</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($t = mysqli_fetch_assoc($query_latest)) { ?>
                <tr>
                    <td><?= $t['kode_ticket'] ?></td>
                    <td><?= $t['NIP'] ?></td>
                    <td><?= $t['Nama'] ?></td>
                    <td>
                        <?php
                            $status_color = ["", "success", "danger", "warning"];
                        ?>
                        <span class="badge badge-<?= $status_color[$t['id_status']] ?>">
                            <?= ['','Diterima','Ditolak','Dalam Pengerjaan'][$t['id_status']] ?>
                        </span>
                    </td>
                    <td><?= $t['tanggal'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ==================== CHART JS ==================== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartStatus').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets: [
            {
                label: 'Diterima',
                data: <?= json_encode(array_values($data_diterima)) ?>,
                borderColor: '#28a745',
                backgroundColor: '#28a745',
                tension: 0,
                pointRadius: 5,
                fill: false
            },
            {
                label: 'Ditolak',
                data: <?= json_encode(array_values($data_ditolak)) ?>,
                borderColor: '#dc3545',
                backgroundColor: '#dc3545',
                tension: 0,
                pointRadius: 5,
                fill: false
            },
            {
                label: 'Dalam Pengerjaan',
                data: <?= json_encode(array_values($data_proses)) ?>,
                borderColor: '#ffc107',
                backgroundColor: '#ffc107',
                tension: 0,
                pointRadius: 5,
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: { 
                beginAtZero: true, 
                min: 0,
                max: 10,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>

<script>
const ctxPie = document.getElementById('pieRuangan').getContext('2d');

new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: <?= json_encode($ruangan_labels) ?>,
        datasets: [{
            data: <?= json_encode($ruangan_values) ?>,
            backgroundColor: [
                '#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8',
                '#6610f2', '#fd7e14', '#6f42c1', '#20c997', '#e83e8c'
            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: { boxWidth: 20 }
            }
        }
    }
});
</script>
