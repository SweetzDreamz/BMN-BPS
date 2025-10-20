<div class="card card-info">
	
	<div class="card-header">
		<h3 class="card-title">
			<i class="far fa fa-wallet"></i> Arsip SPM</h3>
	</div>
	
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-spm" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<label style="font-size: 18px;">Pencarian: </label>
			<br>
			<!-- Tombol Pencarian dengan Konten Pencarian di dalamnya -->
			<div class="search-icon-container">
				<button onclick="toggleSearch()" class="btn btn-primary">
					<i class="fa fa-search"></i> Pencarian
				</button>
			</div>
			<div id="search-container" class="search-container">
				<div>
					<label for="search-no-spm" style="font-weight: normal;">No SPM:</label>
					<input type="text" id="search-no-spm" class="form-control">
				</div>
				<div>
					<label for="search-tanggal-spm" style="font-weight: normal;">Tanggal SPM:</label>
					<input type="text" id="search-tanggal-spm" class="form-control">
				</div>
				<div>
					<label for="search-jenis-spm" style="font-weight: normal;">Jenis SPM:</label>
					<input type="text" id="search-jenis-spm" class="form-control">
				</div>
				<div>
					<label for="search-deskripsi-spm" style="font-weight: normal;">Deskripsi:</label>
					<input type="text" id="search-deskripsi-spm" class="form-control">
				</div>
			</div>
			<br>
			<br>
			<table id="example5" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>No Map</th>
						<th>No SPM</th>
						<th>Tanggal SPM</th>
						<th>Nilai SPM</th>
						<th>Jenis SPM</th>
						<th>Deskripsi</th>
						<th>File SPM</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_arsip_spm");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['no_map']; ?>
						</td>
						<td>
							<?php echo $data['no_spm']; ?>
						</td>
						<td>
							<?php echo $data['tanggal_spm']; ?>
						</td>
						<td>
							<?php echo number_format($data['nilai_spm'], 0, ','); ?>
						</td>
						<td>
							<?php echo $data['jenis_spm']; ?>
						</td>
						<td>
							<?php echo $data['deskripsi']; ?>
						</td>
						<td>
							<a href="<?php echo $data['file_spm']; ?>" target="_blank">Lihat File</a>
						</td>
						<td>
							<a href="?page=edit-spm&kode=<?php echo $data['kode_spm']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-spm&kode=<?php echo $data['kode_spm']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
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
	<!-- /.card-body -->

	<!-- JavaScript di dalam tag <script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleSearch() {
			var container = document.getElementById("search-container");
			if (container.style.display === "none" || container.style.display === "") {
				container.style.display = "grid"; // Tampilkan dengan gaya grid
			} else {
				container.style.display = "none"; // Sembunyikan
			}
		}
    </script>


	<style>
		
        /* Menyembunyikan pencarian global pada DataTable */
        .dataTables_filter {
            display: none;  /* Menyembunyikan input pencarian global */
        }
    
		.search-container {
			display: none; /* Mulai dalam keadaan tersembunyi */
			max-width: 750px; /* Lebar maksimum */
    		min-width: 200px; /* Lebar minimum */
			grid-template-columns: repeat(4, 1fr);
			gap: 20px;
			padding: 10px;
			background-color: #f8f9fa;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.search-container label {
			font-weight: normal;
			font-size: 15px;
		}

		.search-container input {
			padding: 10px;
			font-size: 15px;
			width: 100%;
		}
    </style>
	