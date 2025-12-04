<?php
// admin/Kelola BMN/export_excel_bmn.php

// Matikan error display agar tidak merusak file excel
ini_set('display_errors', 0);
error_reporting(0);

require '../../vendor/autoload.php';
include '../../aksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

$id_barang = isset($_GET['kode']) ? $_GET['kode'] : 0;

if ($id_barang == 0) { die("ID tidak ditemukan."); }

// --- QUERY BARANG ---
$qBarang = mysqli_query($koneksi, "SELECT * FROM tabel_barang WHERE id_barang = '$id_barang'");
$barang = mysqli_fetch_assoc($qBarang);
if (!$barang) { die("Data barang tidak ada."); }

// --- QUERY TIKET (DIPERBAIKI) ---
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

// --- BUAT EXCEL ---
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Kartu Pemeliharaan');

// Header
$sheet->mergeCells('A1:E1');
$sheet->setCellValue('A1', 'KARTU PEMELIHARAAN BARANG MILIK NEGARA');
$sheet->getStyle('A1')->applyFromArray([
    'font' => ['bold' => true, 'size' => 14],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]
]);

// Info Barang
$row = 3;
$dataInfo = [
    'Nama Barang' => $barang['nama_barang'],
    'Kode Barang' => $barang['kode_barang'],
    'NUP' => $barang['NUP'],
    'Merk' => $barang['merk_bmn'],
    'Tahun' => date('Y', strtotime($barang['tahun_perolehan']))
];

foreach($dataInfo as $label => $val){
    $sheet->setCellValue('A'.$row, $label);
    $sheet->setCellValue('B'.$row, ':');
    $sheet->setCellValue('C'.$row, $val);
    $sheet->getStyle('A'.$row)->getFont()->setBold(true);
    $row++;
}

// Tabel Tiket
$row += 2;
$startTable = $row;
$headers = ['No', 'Tanggal', 'Uraian Keluhan', 'Pelapor', 'Status'];
$col = 'A';
foreach($headers as $h){
    $sheet->setCellValue($col.$row, $h);
    $col++;
}

// Style Header Tabel
$sheet->getStyle("A$row:E$row")->applyFromArray([
    'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4F81BD']],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]]
]);

// Isi Data
$row++;
$no = 1;
if(mysqli_num_rows($qTiket) > 0){
    while($t = mysqli_fetch_assoc($qTiket)){
        $sheet->setCellValue('A'.$row, $no++);
        $sheet->setCellValue('B'.$row, date('d-m-Y', strtotime($t['tanggal_keluhan'])));
        $sheet->setCellValue('C'.$row, $t['detail_keluhan']); 
        $sheet->setCellValue('D'.$row, $t['nama_pelapor']);
        $sheet->setCellValue('E'.$row, $t['keterangan_status']);
        $row++;
    }
} else {
    $sheet->mergeCells("A$row:E$row");
    $sheet->setCellValue("A$row", "Belum ada riwayat tiket.");
    $sheet->getStyle("A$row")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $row++;
}

// Styling Akhir
$lastRow = $row - 1;
$sheet->getStyle("A$startTable:E$lastRow")->applyFromArray([
    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
    'alignment' => ['vertical' => Alignment::VERTICAL_TOP]
]);
$sheet->getStyle("C".($startTable+1).":C$lastRow")->getAlignment()->setWrapText(true);

// Lebar Kolom
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setWidth(50);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('E')->setAutoSize(true);

// Download
$filename = "Kartu_BMN_" . preg_replace('/[^A-Za-z0-9]/', '_', $barang['kode_barang']) . ".xlsx";
ob_end_clean(); // Bersihkan buffer
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;