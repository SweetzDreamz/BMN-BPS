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
							<a href="?page=del-pengguna&kode=<?php echo $data['NIP']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
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
