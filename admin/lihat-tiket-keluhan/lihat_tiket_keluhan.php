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

<!-- TABLE: daftar tiket (baris bisa diklik) -->
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
                        t.*,
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
                    // tentukan badge
                    switch ($data['id_status']) {
                        case 1: $badge_class = 'badge-success'; break;
                        case 2: $badge_class = 'badge-danger'; break;
                        default: $badge_class = 'badge-secondary'; break;
                    }

                    // escape untuk atribut data (agar tanda kutip/HTML aman)
                    $d = [];
                    $d['kode_ticket']      = htmlspecialchars($data['kode_ticket'], ENT_QUOTES);
                    $d['id_barang']        = htmlspecialchars($data['id_barang'], ENT_QUOTES);
                    $d['NIP']              = htmlspecialchars($data['NIP'], ENT_QUOTES);
                    $d['id_status']        = htmlspecialchars($data['id_status'], ENT_QUOTES);
                    $d['tanggal']          = htmlspecialchars($data['tanggal'], ENT_QUOTES);
                    $d['keluhan']          = htmlspecialchars($data['keluhan'], ENT_QUOTES);
                    $d['hasil_pengecekan'] = htmlspecialchars($data['hasil_pengecekan'], ENT_QUOTES);
                    $d['tindakan']         = htmlspecialchars($data['tindakan'], ENT_QUOTES);
                    $d['biaya']            = htmlspecialchars($data['biaya'], ENT_QUOTES);
                    $d['pihak_mengerjakan'] = htmlspecialchars($data['pihak_mengerjakan'], ENT_QUOTES);
                    $d['paraf_pelaksana']  = htmlspecialchars($data['paraf_pelaksana'], ENT_QUOTES);
                    $d['paraf_pengurus']   = htmlspecialchars($data['paraf_pengurus'], ENT_QUOTES);
                    $d['keterangan']       = htmlspecialchars($data['keterangan'], ENT_QUOTES);
                    $d['nama_barang']      = htmlspecialchars($data['nama_barang'], ENT_QUOTES);
                    $d['keterangan_status'] = htmlspecialchars($data['keterangan_status'], ENT_QUOTES);
                ?>
                    <tr class="clickable-row"
                        data-id_status="<?php echo $d['id_status']; ?>"
                        data-kode_ticket="<?php echo $d['kode_ticket']; ?>"
                        data-id_barang="<?php echo $d['id_barang']; ?>"
                        data-nip="<?php echo $d['NIP']; ?>"
                        data-id_status="<?php echo $d['id_status']; ?>"
                        data-tanggal="<?php echo $d['tanggal']; ?>"
                        data-keluhan="<?php echo $d['keluhan']; ?>"
                        data-hasil="<?php echo $d['hasil_pengecekan']; ?>"
                        data-tindakan="<?php echo $d['tindakan']; ?>"
                        data-biaya="<?php echo $d['biaya']; ?>"
                        data-pihak="<?php echo $d['pihak_mengerjakan']; ?>"
                        data-paraf_p="<?php echo $d['paraf_pelaksana']; ?>"
                        data-paraf_g="<?php echo $d['paraf_pengurus']; ?>"
                        data-keterangan="<?php echo $d['keterangan']; ?>"
                        data-nama_barang="<?php echo $d['nama_barang']; ?>"
                        data-keterangan_status="<?php echo $d['keterangan_status']; ?>"
                        style="cursor:pointer;"
                    >
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td>
                            <span class="badge <?php echo $badge_class; ?>">
                                <?php echo $data['keterangan_status']; ?>
                            </span>
                        </td>
                    </tr>
                <?php } // end while ?>
            </tbody>
        </table>
    </div>
</div>

<!-- SINGLE MODAL (harus DI LUAR tabel, letakkan tepat setelah tabel) -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="detailModalLabel"><i class="fas fa-info-circle"></i> Detail Tiket</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-borderless">
          <tbody>
            <tr><th width="30%">Kode Tiket</th><td id="m_kode_ticket"></td></tr>
            <tr><th>NIP</th><td id="m_nip"></td></tr>
            <tr><th>Tanggal</th><td id="m_tanggal"></td></tr>
            <tr><th>Nama Barang</th><td id="m_nama_barang"></td></tr>
            <tr><th>keluhan</th><td id="m_keluhan"></td></tr>
            <tr><th>Hasil Pengecekan</th><td id="m_hasil"></td></tr>
            <tr><th>Tindakan</th><td id="m_tindakan"></td></tr>
            <tr><th>Biaya</th><td id="m_biaya"></td></tr>
            <tr><th>Pihak yang Mengerjakan</th><td id="m_pihak"></td></tr>
            <tr><th>Paraf Pelaksana</th><td id="m_paraf_p"></td></tr>
            <tr><th>Paraf Pengurus</th><td id="m_paraf_g"></td></tr>
            <tr><th>Keterangan</th><td id="m_keterangan"></td></tr>
            <tr><th>Status</th><td id="m_keterangan_status"></td></tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
      </div>
    </div>
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

                $(document).ready(function(){
                    // inisialisasi DataTable bila belum atau dipanggil sebelumnya
                    if (! $.fn.DataTable.isDataTable('#example1')) {
                        $('#example1').DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "pageLength": 10
                        });
                    }

                    // klik baris: isi modal dan tampilkan
                    $(document).on('click', '.clickable-row', function(){
                        var $tr = $(this);

                        var kode       = $tr.data('kode_ticket') || '';
                        var nip        = $tr.data('nip') || '';
                        var tanggal    = $tr.data('tanggal') || '';
                        var nama_barang = $tr.data('nama_barang') || '';
                        var keluhan    = $tr.data('keluhan') || '';
                        var hasil      = $tr.data('hasil') || ''; 
                        var tindakan   = $tr.data('tindakan') || '';
                        var biaya      = $tr.data('biaya') || '';
                        var pihak      = $tr.data('pihak_mengerjakan') || $tr.data('pihak') || '';
                        var paraf_p    = $tr.data('paraf_p') || '';
                        var paraf_g    = $tr.data('paraf_g') || '';
                        var keterangan = $tr.data('keterangan') || '';
                        var keterangan_status = $tr.data('keterangan_status') || '';

                        if (biaya !== '' && !isNaN(biaya)) {
                            biaya = 'Rp. ' + Number(biaya).toLocaleString('id-ID');
                        }

                        $('#m_kode_ticket').text(kode);
                        $('#m_nip').text(nip);
                        $('#m_tanggal').text(tanggal);
                        $('#m_nama_barang').text(nama_barang);
                        $('#m_keluhan').html(keluhan.replace(/\n/g, "<br>"));
                        $('#m_hasil').html(hasil.replace(/\n/g, "<br>"));
                        $('#m_tindakan').html(tindakan.replace(/\n/g, "<br>"));
                        $('#m_biaya').text(biaya);
                        $('#m_pihak').text(pihak);
                        $('#m_paraf_p').text(paraf_p);
                        $('#m_paraf_g').text(paraf_g);
                        $('#m_keterangan').html(keterangan.replace(/\n/g, "<br>"));
                        
                        // ===== pewarnaan status =====
                        var id_status = $tr.data('id_status');
                        var statusBadgeClass = '';

                        switch (parseInt(id_status)) {
                            case 1:
                                statusBadgeClass = 'badge-success'; // Diterima
                                break;
                            case 2:
                                statusBadgeClass = 'badge-danger';  // Ditolak
                                break;
                            case 3:
                                statusBadgeClass = 'badge-secondary'; // Dalam pengerjaan 
                                break;
                        }

                        $('#m_keterangan_status')
                            .html('<span class="badge ' + statusBadgeClass + '">' + keterangan_status + '</span>');

                        $('#detailModal').modal('show');
                    });

                });
            </script>

            <style>
            /* ===== Hover efek baris tabel ===== */
            .clickable-row {
                cursor: pointer;
                transition: background-color 0.2s ease, transform 0.1s ease;
            }

            .clickable-row:hover {
                color: #f8f9fa !important;
                background-color: #318CE7 !important;   /* biru lembut saat hover */
                transform: scale(1.005);                /* sedikit membesar */
            }

            /* ===== Tampilan badge status ===== */
            .badge-success { background-color: #28a745; }
            .badge-danger { background-color: #dc3545; }
            .badge-secondary { background-color: #6c757d; }

            /* ===== Styling tabel di dalam modal ===== */
            #detailModal .table th {
                width: 35%;
                font-weight: 600;
                background-color: #ecececff;
                border-top: none;
            }

            #detailModal .table td {
                color: #242424ff;
            }

            /* Tambahkan garis pemisah antar baris */
            #detailModal .table tr {
                border: 1px solid #dee2e6;
            }


            /* Tambahkan sedikit jarak antar baris */
            #detailModal .table th, 
            #detailModal .table td {
                padding: 10px 8px;
                vertical-align: top;
            }
            </style>



        </div>
    </div>
</div>
