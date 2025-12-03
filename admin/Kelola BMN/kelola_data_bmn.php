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
</style>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> <b>Data BMN</b></h3>
	</div>

	<div class="card-body">
		<div class="table-responsive">
            <div>
                <a href="?page=add_data_bmn" class="btn btn-success">
                    <i class="fa fa-edit"></i> Tambah Data Barang</a>
            </div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Jenis BMN</th>
						<th>Ruangan</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>

			<?php
                $sql = $konek->query("
                    SELECT b.*, r.nama_ruangan 
                    FROM tabel_barang b
                    LEFT JOIN tabel_ruangan r ON b.kode_ruangan = r.kode_ruangan
                    ORDER BY b.id_barang
                ");
                while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $data['id_barang']; ?>
						</td>
						<td>
							<?php echo $data['nama_barang']; ?>
						</td>
						<td>
							<?php echo $data['jenis_bmn']; ?>
						</td>
                        <td>
                            <?php 
                                echo $data['kode_ruangan'] . " - " . $data['nama_ruangan'];
                            ?>
                        </td>
                        <td>
                            <a href="?page=edit_data_bmn&kode=<?php echo $data['id_barang']; ?>" 
                            class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#" 
                            onclick="konfirmasiHapus('?page=del_data_bmn&kode=<?php echo $data['id_barang']; ?>')" 
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
                <p>Apakah Anda yakin ingin menghapus data BMN ini?</p>
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
