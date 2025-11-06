<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="far fa fa-wallet"></i> Tiket Keluhan
        </h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=arsip-dus" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Input Keluhan
                </a>
            </div>
            <br>

            <?php
            // Pastikan user sudah login
            if (!isset($_SESSION['ses_id'])) {
                echo "<script>
                alert('Silakan login terlebih dahulu!');
                window.location = '../../login.php';
                </script>";
                exit;
            }

            // Ambil NIP user yang sedang login
            $nip_login = $_SESSION['ses_id'];
            ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table id='example1' class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($konek, "
                                SELECT 
                                    t.kode_ticket, 
                                    t.tanggal, 
                                    b.nama_barang, 
                                    s.keterangan_status,
                                    s.id_status
                                FROM tabel_tiket t
                                LEFT JOIN tabel_barang b ON t.id_barang = b.id_barang
                                LEFT JOIN status s ON t.id_status = s.id_status
                                WHERE t.NIP = '$nip_login'
                                ORDER BY t.kode_ticket DESC
                            ");

                            while ($data = mysqli_fetch_array($sql, MYSQLI_BOTH)) {
                                // Tentukan warna badge berdasarkan id_status
                                switch ($data['id_status']) {
                                    case 1: // ✅ Diterima
                                        $badge_class = 'badge-success';
                                        break;
                                    case 2: // ❌ Ditolak
                                        $badge_class = 'badge-danger';
                                        break;
                                    case 3: // ⏳ Dalam Pengerjaan
                                    default:
                                        $badge_class = 'badge-secondary';
                                        break;
                                }
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['tanggal']; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td>
                                        <span class="badge <?php echo $badge_class; ?>">
                                            <?php echo $data['keterangan_status']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- DataTables -->
            <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

            <script src="plugins/jquery/jquery.min.js"></script>
            <script src="plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

            <script>
                $(function() {
                    $("#example1").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                        "pageLength": 10,
                    });
                });
            </script>

            <style>

                
                .badge-success {
                    background-color: #28a745;
                }
                .badge-danger {
                    background-color: #dc3545;
                }
                .badge-secondary {
                    background-color: #6c757d;
                }
            </style>

        </div>
    </div>
</div>
