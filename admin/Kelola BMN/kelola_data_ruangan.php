<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Ruangan</h3>
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

                            <a href="?page=del_data_ruangan&kode=<?php echo $data['kode_ruangan']; ?>" 
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