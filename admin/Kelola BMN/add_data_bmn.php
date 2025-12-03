<style>
.card.card-info {
	border-radius: 12px;
	box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
	border: none;
}

.card-header {
	background: linear-gradient(135deg, #007bff, #00a0ff);
	color: white;
	border-top-left-radius: 12px;
	border-top-right-radius: 12px;
	padding: 16px 20px;
}

.card-header h3 {
	margin: 0;
	font-weight: 600;
}

.form-group label {
	font-weight: 500;
	color: #343a40;
	margin-bottom: 6px;
	display: block;
	transition: color 0.2s ease;
}

.form-control {
	border: 1.5px solid #ced4da;
	border-radius: 8px !important;
	padding: 10px 12px;
	transition: all 0.25s ease;
}

.form-control:focus {
	border-color: #007bff !important;
	box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.15);
}

.form-group {
	margin-bottom: 18px;
}

.card-footer {
	background-color: #f8f9fa;
	border-bottom-left-radius: 12px;
	border-bottom-right-radius: 12px;
	padding: 14px 20px;
}

.btn-info {
	background: linear-gradient(135deg, #007bff, #00a0ff);
	border-radius: 8px;
	border: none;
	padding: 10px 18px;
	font-weight: 500;
	transition: all 0.2s ease;
}
.btn-info:hover {
	transform: translateY(-2px);
	box-shadow: 0 3px 10px rgba(0, 123, 255, 0.4);
}
 .btn-secondary {
    border-radius: 8px;
    padding: 10px 18px;
}
</style>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data BMN
		</h3>
	</div>
    <form method="post">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID Barang</label>
                        <input type="text" class="form-control" name="id_barang" placeholder="Masukkan Kode Barang + NUP" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis BMN</label>
                        <input type="text" class="form-control" name="jenis_bmn" placeholder="Jenis BMN"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Satker</label>
                        <input type="text" class="form-control" name="kode_satker" placeholder="Kode Satker"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Satker</label>
                        <input type="text" class="form-control" name="nama_satker" placeholder="Nama Satker"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>NUP</label>
                        <input type="text" class="form-control" name="nup" placeholder="NUP"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control" name="merk" placeholder="Merk"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" name="tipe" placeholder="Tipe"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kondisi</label>
                        <input type="text" class="form-control" name="kondisi" placeholder="Kondisi"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Umur Aset</label>
                        <input type="text" class="form-control" name="umur_aset" placeholder="Umur Aset"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Intra/Extra</label>
                        <input type="text" class="form-control" name="intra_extra" placeholder="Intra/Extra"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Henti Guna</label>
                        <input type="text" class="form-control" name="henti_guna" placeholder="Henti Guna"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status SBSN</label>
                        <input type="text" class="form-control" name="status_sbsn" placeholder="Status SBSN"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status BMN Idle</label>
                        <input type="text" class="form-control" name="status_bmn_idle" placeholder="Status BMN Idle"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status Kemitraan</label>
                        <input type="text" class="form-control" name="status_kemitraan" placeholder="Status Kemitraan"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>BPYBDS</label>
                        <input type="text" class="form-control" name="bpybds" placeholder="BPYBDS"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usulan Barang Hilang</label>
                        <input type="text" class="form-control" name="usulan_barang_hilang" placeholder="Usulan Barang Hilang"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usulan Barang RB</label>
                        <input type="text" class="form-control" name="usulan_barang_rb" placeholder="Usulan Barang RB"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usul Hapus</label>
                        <input type="text" class="form-control" name="usul_hapus" placeholder="Usul Hapus"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hibah DKTP</label>
                        <input type="text" class="form-control" name="hibah_dktp" placeholder="Hibah DKTP"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Konsensi Jasa</label>
                        <input type="text" class="form-control" name="konsensi_jasa" placeholder="Konsensi Jasa"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Properti Investasi</label>
                        <input type="text" class="form-control" name="properti_investasi" placeholder="Properti Investasi"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Dokumen</label>
                        <input type="text" class="form-control" name="jenis_dokumen" placeholder="Jenis Dokumen"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Dokumen</label>
                        <input type="text" class="form-control" name="no_dokumen" placeholder="No Dokumen"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No BPKP</label>
                        <input type="text" class="form-control" name="no_bpkp" placeholder="No BPKP"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Polisi</label>
                        <input type="text" class="form-control" name="no_polisi" placeholder="No Polisi"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status Sertifikasi</label>
                        <input type="text" class="form-control" name="status_sertifikasi" placeholder="Status Sertifikasi"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Sertifikat</label>
                        <input type="text" class="form-control" name="jenis_sertipikat" placeholder="Jenis Sertifikat"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Sertifikat</label>
                        <input type="text" class="form-control" name="no_sertifikat" placeholder="No Sertifikat"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Buku Pertama</label>
                        <input type="date" class="form-control" name="tanggal_buku_pertama"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Perolehan</label>
                        <input type="date" class="form-control" name="tanggal_perolehan"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Penghapusan</label>
                        <input type="date" class="form-control" name="tanggal_penghapusan"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Perolehan Pertama</label>
                        <input type="text" class="form-control" name="nilai_perolehan_pertama" placeholder="Nilai Perolehan Pertama"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Mutasi</label>
                        <input type="text" class="form-control" name="nilai_mutasi" placeholder="Nilai Mutasi"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Perolehan</label>
                        <input type="text" class="form-control" name="nilai_perolehan" placeholder="Nilai Perolehan"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Penyusutan</label>
                        <input type="text" class="form-control" name="nilai_penyusutan" placeholder="Nilai Penyusutan"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Buku</label>
                        <input type="text" class="form-control" name="nilai_buku" placeholder="Nilai Buku"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Tanah Seluruhnya</label>
                        <input type="text" class="form-control" name="luas_tanah_seluruhnya" placeholder="Luas Tanah Seluruhnya"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Tanah Bangunan</label>
                        <input type="text" class="form-control" name="luas_tanah_bangunan" placeholder="Luas Tanah Bangunan"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Sarana Lingkungan</label>
                        <input type="text" class="form-control" name="luas_tanah_sarana_lingkungan" placeholder="Luas Sarana Lingkungan"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Lahan Kosong</label>
                        <input type="text" class="form-control" name="luas_lahan_kosong" placeholder="Luas Lahan Kosong"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Bangunan</label>
                        <input type="text" class="form-control" name="luas_bangunan" placeholder="Luas Bangunan"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Tapak Bangunan</label>
                        <input type="text" class="form-control" name="luas_tapak_bangunan" placeholder="Luas Tapak Bangunan"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Pemanfaatan</label>
                        <input type="text" class="form-control" name="luas_pemanfaatan" placeholder="Luas Pemanfaatan"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jumlah Lantai</label>
                        <input type="text" class="form-control" name="jumlah_lantai" placeholder="Jumlah Lantai"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jumlah Foto</label>
                        <input type="text" class="form-control" name="jumlah_foto" placeholder="Jumlah Foto"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status Penggunaan</label>
                        <input type="text" class="form-control" name="status_penggunaan" placeholder="Status Penggunaan"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No PSP</label>
                        <input type="text" class="form-control" name="no_psp" placeholder="No PSP"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal PSP</label>
                        <input type="date" class="form-control" name="tanggal_psp"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>RT/RW</label>
                        <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelurahan/Desa</label>
                        <input type="text" class="form-control" name="kelurahan_desa" placeholder="Kelurahan/Desa"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kab/Kota</label>
                        <input type="text" class="form-control" name="kab_kota" placeholder="Kab/Kota"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Kab/Kota</label>
                        <input type="text" class="form-control" name="kode_kab_kota" placeholder="Kode Kab/Kota"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" placeholder="Provinsi"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Provinsi</label>
                        <input type="text" class="form-control" name="kode_provinsi" placeholder="Kode Provinsi"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>SBSK</label>
                        <input type="text" class="form-control" name="sbsk" placeholder="SBSK"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Optimalisasi</label>
                        <input type="text" class="form-control" name="optimalisasi" placeholder="Optimalisasi"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Penghuni</label>
                        <input type="text" class="form-control" name="penghuni" placeholder="Penghuni"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pengguna</label>
                        <input type="text" class="form-control" name="pengguna" placeholder="Pengguna"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode KPKNL</label>
                        <input type="text" class="form-control" name="kode_kpknl" placeholder="Kode KPKNL"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Uraian KPKNL</label>
                        <input type="text" class="form-control" name="uraian_kpknl" placeholder="Uraian KPKNL"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Uraian Kanwil DJKN</label>
                        <input type="text" class="form-control" name="uraian_kanwil_djkn" placeholder="Uraian Kanwil DJKN"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama KL</label>
                        <input type="text" class="form-control" name="nama_kl" placeholder="Nama KL"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama E1</label>
                        <input type="text" class="form-control" name="nama_e1" placeholder="Nama E1"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Korwil</label>
                        <input type="text" class="form-control" name="nama_korwil" placeholder="Nama Korwil"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Register</label>
                        <input type="text" class="form-control" name="kode_register" placeholder="Kode Register"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Ruangan</label>
                        <input type="text" class="form-control" name="kode_ruangan" placeholder="Kode Ruangan"/>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer text-right">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=kelola_data_bmn" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {

    $sql_simpan = "INSERT INTO tabel_barang (
        id_barang, jenis_bmn, kode_satker, nama_satker, kode_barang, nup, nama_barang, merk, tipe, 
        kondisi, umur_aset, intra_extra, henti_guna, status_sbsn, status_bmn_idle, status_kemitraan, 
        bpybds, usulan_barang_hilang, usulan_barang_rb, usul_hapus, hibah_dktp, konsensi_jasa, 
        properti_investasi, jenis_dokumen, no_dokumen, no_bpkp, no_polisi, status_sertifikasi, 
        jenis_sertipikat, no_sertifikat, nama, tanggal_buku_pertama, tanggal_perolehan, 
        tanggal_penghapusan, nilai_perolehan_pertama, nilai_mutasi, nilai_perolehan, nilai_penyusutan, 
        nilai_buku, luas_tanah_seluruhnya, luas_tanah_bangunan, luas_tanah_sarana_lingkungan, 
        luas_lahan_kosong, luas_bangunan, luas_tapak_bangunan, luas_pemanfaatan, jumlah_lantai, 
        jumlah_foto, status_penggunaan, no_psp, tanggal_psp, alamat, rt_rw, kelurahan_desa, 
        kecamatan, kab_kota, kode_kab_kota, provinsi, kode_provinsi, kode_pos, sbsk, optimalisasi, 
        penghuni, pengguna, kode_kpknl, uraian_kpknl, uraian_kanwil_djkn, nama_kl, nama_e1, 
        nama_korwil, kode_register, kode_ruangan
    ) VALUES (
        '".$_POST['id_barang']."',
        '".$_POST['jenis_bmn']."',
        '".$_POST['kode_satker']."',
        '".$_POST['nama_satker']."',
        '".$_POST['kode_barang']."',
        '".$_POST['nup']."',
        '".$_POST['nama_barang']."',
        '".$_POST['merk']."',
        '".$_POST['tipe']."',
        '".$_POST['kondisi']."',
        '".$_POST['umur_aset']."',
        '".$_POST['intra_extra']."',
        '".$_POST['henti_guna']."',
        '".$_POST['status_sbsn']."',
        '".$_POST['status_bmn_idle']."',
        '".$_POST['status_kemitraan']."',
        '".$_POST['bpybds']."',
        '".$_POST['usulan_barang_hilang']."',
        '".$_POST['usulan_barang_rb']."',
        '".$_POST['usul_hapus']."',
        '".$_POST['hibah_dktp']."',
        '".$_POST['konsensi_jasa']."',
        '".$_POST['properti_investasi']."',
        '".$_POST['jenis_dokumen']."',
        '".$_POST['no_dokumen']."',
        '".$_POST['no_bpkp']."',
        '".$_POST['no_polisi']."',
        '".$_POST['status_sertifikasi']."',
        '".$_POST['jenis_sertipikat']."',
        '".$_POST['no_sertifikat']."',
        '".$_POST['nama']."',
        '".$_POST['tanggal_buku_pertama']."',
        '".$_POST['tanggal_perolehan']."',
        '".$_POST['tanggal_penghapusan']."',
        '".$_POST['nilai_perolehan_pertama']."',
        '".$_POST['nilai_mutasi']."',
        '".$_POST['nilai_perolehan']."',
        '".$_POST['nilai_penyusutan']."',
        '".$_POST['nilai_buku']."',
        '".$_POST['luas_tanah_seluruhnya']."',
        '".$_POST['luas_tanah_bangunan']."',
        '".$_POST['luas_tanah_sarana_lingkungan']."',
        '".$_POST['luas_lahan_kosong']."',
        '".$_POST['luas_bangunan']."',
        '".$_POST['luas_tapak_bangunan']."',
        '".$_POST['luas_pemanfaatan']."',
        '".$_POST['jumlah_lantai']."',
        '".$_POST['jumlah_foto']."',
        '".$_POST['status_penggunaan']."',
        '".$_POST['no_psp']."',
        '".$_POST['tanggal_psp']."',
        '".$_POST['alamat']."',
        '".$_POST['rt_rw']."',
        '".$_POST['kelurahan_desa']."',
        '".$_POST['kecamatan']."',
        '".$_POST['kab_kota']."',
        '".$_POST['kode_kab_kota']."',
        '".$_POST['provinsi']."',
        '".$_POST['kode_provinsi']."',
        '".$_POST['kode_pos']."',
        '".$_POST['sbsk']."',
        '".$_POST['optimalisasi']."',
        '".$_POST['penghuni']."',
        '".$_POST['pengguna']."',
        '".$_POST['kode_kpknl']."',
        '".$_POST['uraian_kpknl']."',
        '".$_POST['uraian_kanwil_djkn']."',
        '".$_POST['nama_kl']."',
        '".$_POST['nama_e1']."',
        '".$_POST['nama_korwil']."',
        '".$_POST['kode_register']."',
        '".$_POST['kode_ruangan']."'
    )";

    $query_simpan = mysqli_query($konek, $sql_simpan);

    if ($query_simpan) {
        echo "
        <script>
            Swal.fire({
                title: 'Tambah Data BMN Berhasil',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=kelola_data_bmn';
            });
        </script>";
    } else {
        echo "
        <script>
            Swal.fire({
                title: 'Tambah Data BMN Gagal',
                text: '".mysqli_real_escape_string($konek, mysqli_error($konek))."',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=add_data_bmn';
            });
        </script>";
    }
}
?>