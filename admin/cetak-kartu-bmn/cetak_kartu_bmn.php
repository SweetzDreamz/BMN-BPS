<?php
// admin/Kelola BMN/tampil_kartu_bmn.php

// Tampilkan error jika ada (untuk debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../aksi.php';

// Ambil ID dari URL
$id_barang = isset($_GET['kode']) ? $_GET['kode'] : 0;

// 1. Query Data Barang
$qBarang = mysqli_query($koneksi, "SELECT * FROM tabel_barang WHERE id_barang = '$id_barang'");
$barang = mysqli_fetch_assoc($qBarang);

if (!$barang) {
    die("Error: Data barang tidak ditemukan. Pastikan ID barang benar.");
}

// 2. Query Data Tiket
// HANYA ambil kolom yang pasti ada: detail_keluhan, tanggal, status, user
$qTiket = mysqli_query($koneksi, "
    SELECT 
        t.*, 
        p.nama_lengkap AS nama_pelapor, 
        s.keterangan_status
    FROM tabel_tiket t
    LEFT JOIN tabel_pengguna p ON t.NIP = p.NIP
    LEFT JOIN status s ON t.id_status = s.id_status
    WHERE t.id_barang = '$id_barang'
    ORDER BY t.tanggal_keluhan DESC
");

if (!$qTiket) {
    die("Error Query Tiket: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kartu Pemeliharaan - <?= $barang['nama_barang']; ?></title>
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; color: #333; font-family: sans-serif; }
        .page-container { max-width: 21cm; margin: 30px auto; background: #fff; padding: 40px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .card-header-title { text-align: center; font-weight: 700; font-size: 18px; text-decoration: underline; margin-bottom: 25px; text-transform: uppercase; }
        .table-info-barang td { padding: 5px 10px; vertical-align: top; font-size: 14px; }
        .label-col { width: 160px; font-weight: 600; }
        
        .table-history { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 13px; }
        .table-history th { background-color: #007bff; color: white; text-align: center; padding: 10px; border: 1px solid #333; }
        .table-history td { padding: 8px; border: 1px solid #333; vertical-align: top; }
        .bg-light-gray { background-color: #f9f9f9; }
        
        @media print {
            .no-print { display: none !important; }
            .page-container { box-shadow: none; margin: 0; padding: 0; }
        }
    </style>
</head>
<body>

<div class="page-container">
    
    <div class="d-flex justify-content-between mb-4 no-print">
        <a href="kelola_data_bmn.php" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <div>
            <button onclick="window.print()" class="btn btn-primary btn-sm mr-2">
                <i class="fas fa-print"></i> Print
            </button>
            <a href="export_excel_bmn.php?id=<?= $id_barang; ?>" target="_blank" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Download Excel
            </a>
        </div>
    </div>

    <div class="card-header-title">KARTU PEMELIHARAAN BARANG MILIK NEGARA</div>

    <table class="table-info-barang">
        <tr><td class="label-col">Nama Barang</td><td>: <?= $barang['nama_barang']; ?></td></tr>
        <tr><td class="label-col">Kode Barang</td><td>: <?= $barang['kode_barang']; ?></td></tr>
        <tr><td class="label-col">NUP</td><td>: <?= $barang['NUP']; ?></td></tr>
        <tr><td class="label-col">Merk / Tipe</td><td>: <?= $barang['merk_bmn']; ?></td></tr>
        <tr><td class="label-col">Tahun Perolehan</td><td>: <?= date('Y', strtotime($barang['tahun_perolehan'])); ?></td></tr>
    </table>

    <br>

    <h6 class="font-weight-bold">Riwayat Pemeliharaan:</h6>
    <table class="table-history">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th>Uraian Keluhan / Kerusakan</th>
                <th width="20%">Pelapor</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if (mysqli_num_rows($qTiket) > 0) {
                while($row = mysqli_fetch_assoc($qTiket)) { 
            ?>
            <tr class="<?= $no % 2 == 0 ? 'bg-light-gray' : ''; ?>">
                <td align="center"><?= $no++; ?></td>
                <td align="center"><?= date('d-m-Y', strtotime($row['tanggal_keluhan'])); ?></td>
                <td><?= nl2br($row['detail_keluhan']); ?></td>
                <td><?= $row['nama_pelapor'] ?? $row['NIP']; ?></td>
                <td align="center"><?= $row['keterangan_status']; ?></td>
            </tr>
            <?php 
                } 
            } else { 
            ?>
            <tr>
                <td colspan="5" align="center" style="padding: 20px; font-style: italic;">
                    Belum ada riwayat tiket.
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>