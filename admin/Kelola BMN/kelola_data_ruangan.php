<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> <b>Data Ruangan</b></h3>
	</div>

	<div class="card-body">
		<div class="table-responsive">
            <div>
                <a href="?page=add_data_ruangan" class="btn btn-success">
                    <i class="fa fa-edit"></i> Tambah Data Ruangan</a>
            </div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>Kode Ruangan</th>
						<th>Nama Ruangan</th>
						<th>Keterangan Ruangan</th>
						<th>Tipe Ruangan</th>
                        <th>Luas (m2)</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

			<?php
                $sql = $konek->query("
                    SELECT * FROM tabel_ruangan ORDER BY kode_ruangan
                ");
                while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $data['kode_ruangan']; ?>
						</td>
						<td>
							<?php echo $data['nama_ruangan']; ?>
						</td>
						<td>
							<?php echo $data['keterangan_ruangan']; ?>
						</td>
                        <td>
                            <?php echo $data['tipe_ruangan']; ?>
                        </td>
                        <td>
                            <?php echo $data['luas_ruangan_m2']; ?>
                        </td>
                        <td>
                            <a href="?page=edit_data_ruangan&kode=<?php echo $data['kode_ruangan']; ?>"
                            class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#" 
                            onclick="konfirmasiHapus('?page=del_data_ruangan&kode=<?php echo $data['kode_ruangan']; ?>')" 
                            title="Hapus Data" 
                            class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>

	</div>
        <div class="modal fade" id="modalKonfirmasiHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalHapusLabel"><i class="fas fa-trash-alt"></i> Konfirmasi Hapus</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus data ruangan ini?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                <a id="btn-hapus-link" href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Ya, Hapus</a>
            </div>
            </div>
        </div>
    </div>

    <script>
        function konfirmasiHapus(urlHapus) {
            // 1. Ambil tombol "Ya, Hapus" di dalam modal
            var tombolHapus = document.getElementById('btn-hapus-link');
            
            // 2. Isi atribut href dengan link penghapusan yang dikirim dari tombol tabel
            tombolHapus.setAttribute('href', urlHapus);
            
            // 3. Tampilkan modal
            $('#modalKonfirmasiHapus').modal('show');
        }
    </script>

    <style>
            .card-info{
				border-radius: 12px;
			}
			.card-header {
                background: linear-gradient(135deg, #007bff, #00a0ff);
                color: white;
                border-top-left-radius: 12px;
                border-top-right-radius: 12px;
                padding: 16px 20px;
            }
            /* Membuat tombol dalam kolom aksi sejajar horizontal */
            td:last-child {
                display: flex;
                gap: 6px;      /* jarak antar tombol */
                align-items: center;
    }
    </style>