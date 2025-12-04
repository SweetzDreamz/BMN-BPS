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
			<i class="fa fa-table"></i> Data Akses</h3>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pengguna" class="btn btn-success">
					<i class="fa fa-edit"></i> Tambah Akses</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>NIP Lama</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Golongan Akhir</th>
						<th>Role</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $konek->query("select * from tabel_pegawai ORDER BY NIP");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['NIP']; ?>
						</td>
						<td>
							<?php echo $data['NIP Lama']; ?>
						</td>
						<td>
							<?php echo $data['Nama']; ?>
						</td>
						<td>
							<?php echo $data['Jabatan']; ?>
						</td>
						<td>
							<?php echo $data['Golongan Akhir']; ?>
						</td>
						<td>
							<?php echo $data['Role']; ?>
						</td>
						<td>
							<a href="?page=edit-pengguna&kode=<?php echo $data['NIP']; ?>" title="Ubah"
							 class="btn btn-warning btn-sm">
								<i class="fa fa-edit"></i>
							</a>
                            <a href="#" 
                            onclick="konfirmasiHapusPengguna('?page=del-pengguna&kode=<?php echo $data['NIP']; ?>')" 
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

	<div class="modal fade" id="modalHapusPengguna" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalHapusPenggunaLabel"><i class="fas fa-trash-alt"></i> Konfirmasi Hapus Data Pengguna</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus data pengguna ini?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                <a id="btn-hapus-link-pengguna" href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Ya, Hapus</a>
            </div>
        </div>
    </div>

	<script>
        function konfirmasiHapusPengguna(urlHapus) {
            // 1. Ambil tombol "Ya, Hapus" di dalam modal
            var tombolHapus = document.getElementById('btn-hapus-link-pengguna');
            
            // 2. Isi atribut href dengan link penghapusan yang dikirim dari tombol tabel
            tombolHapus.setAttribute('href', urlHapus);
            
            // 3. Tampilkan modal
            $('#modalHapusPengguna').modal('show');
        }
    </script>
