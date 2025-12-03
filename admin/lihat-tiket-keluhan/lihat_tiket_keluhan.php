<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="far fa fa-wallet"></i> <b>Daftar Tiket</b>
        </h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <br>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($konek, "
                        SELECT 
                            t.*,
                            b.nama_barang,
                            s.keterangan_status,
                            s.id_status
                        FROM tabel_tiket t
                        LEFT JOIN tabel_barang b ON t.id_barang = b.id_barang
                        LEFT JOIN status s ON t.id_status = s.id_status
                        ORDER BY t.kode_ticket DESC
                    ");

                    while ($data = mysqli_fetch_array($sql, MYSQLI_BOTH)) {

                        switch ($data['id_status']) {
                            case 1: $badge_class = 'badge-success'; break;
                            case 2: $badge_class = 'badge-danger'; break;
                            default: $badge_class = 'badge-warning'; break;
                        }
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $data['nama_barang']; ?></td>
                        <td>
                            <span class="badge <?= $badge_class; ?>">
                                <?= $data['keterangan_status']; ?>
                            </span>
                        </td>

                        <td>
                            <a href="?page=proses_tiket_keluhan&kode=<?= $data['kode_ticket']; ?>" 
                               class="btn btn-primary btn-sm">
                                <i class="fas fa-cogs"></i> Proses
                            </a>

                            <a href="index.php?page=del_tiket_keluhan&kode=<?= $data['kode_ticket']; ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?');">
                            <i class="fa fa-trash"></i>
                            </a>

                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10
    });
});
</script>

<style>
.card-info { border-radius: 12px; }

.card-header {
    background: linear-gradient(135deg, #007bff, #00a0ff);
    color: white;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    padding: 16px 20px;
}
</style>
