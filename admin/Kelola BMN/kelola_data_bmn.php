<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data BMN</h3>
	</div>

	<div class="card-body">
		<div class="table-responsive">
            <div>
                <a href="?page=add-pengguna" class="btn btn-success">
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
                            <a href="?page=edit-bmn&id=<?php echo $data['id_barang']; ?>" 
                            class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="?page=del-bmn&id=<?php echo $data['id_barang']; ?>" 
                            class="btn btn-danger btn-sm" 
                            onclick="return confirm('Yakin ingin menghapus data ini?');">
                                <i class="fa fa-trash"></i>
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