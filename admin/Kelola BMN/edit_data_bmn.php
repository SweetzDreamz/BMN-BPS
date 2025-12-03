
<style>
    .card-success{
        border-radius: 12px;
    }
    .card-header {
        background: linear-gradient(135deg, #007bff, #00a0ff);
        color: white;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 16px 20px;
    }
    .card-footer {
        border-top: 1px solid #dee2e6;
        background-color: #f8f9fa;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
        padding: 14px 20px;
    }

    .btn-info {
        background: linear-gradient(135deg, #007bff, #00a0ff);
        border: none;
        border-radius: 8px;
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

<?php
if(isset($_GET['kode'])){
 $sql_cek="SELECT * FROM tabel_barang WHERE id_barang='".$_GET['kode']."'";
 $q=mysqli_query($konek,$sql_cek);
 $data_cek=mysqli_fetch_array($q,MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Data BMN</h3>
    </div>

    <form method="post">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID Barang</label>
                        <input type="text" class="form-control" name="id_barang" value="<?php echo $data_cek['id_barang']; ?>" readonly/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis BMN</label>
                        <input type="text" class="form-control" name="jenis_bmn" value="<?php echo $data_cek['jenis_bmn']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Satker</label>
                        <input type="text" class="form-control" name="kode_satker" value="<?php echo $data_cek['kode_satker']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Satker</label>
                        <input type="text" class="form-control" name="nama_satker" value="<?php echo $data_cek['nama_satker']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" value="<?php echo $data_cek['kode_barang']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>NUP</label>
                        <input type="text" class="form-control" name="nup" value="<?php echo $data_cek['nup']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="<?php echo $data_cek['nama_barang']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control" name="merk" value="<?php echo $data_cek['merk']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" name="tipe" value="<?php echo $data_cek['tipe']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kondisi</label>
                        <input type="text" class="form-control" name="kondisi" value="<?php echo $data_cek['kondisi']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Umur Aset</label>
                        <input type="text" class="form-control" name="umur_aset" value="<?php echo $data_cek['umur_aset']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Intra/Extra</label>
                        <input type="text" class="form-control" name="intra_extra" value="<?php echo $data_cek['intra_extra']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Henti Guna</label>
                        <input type="text" class="form-control" name="henti_guna" value="<?php echo $data_cek['henti_guna']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status SBSN</label>
                        <input type="text" class="form-control" name="status_sbsn" value="<?php echo $data_cek['status_sbsn']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status BMN Idle</label>
                        <input type="text" class="form-control" name="status_bmn_idle" value="<?php echo $data_cek['status_bmn_idle']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status Kemitraan</label>
                        <input type="text" class="form-control" name="status_kemitraan" value="<?php echo $data_cek['status_kemitraan']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>BPYBDS</label>
                        <input type="text" class="form-control" name="bpybds" value="<?php echo $data_cek['bpybds']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usulan Barang Hilang</label>
                        <input type="text" class="form-control" name="usulan_barang_hilang" value="<?php echo $data_cek['usulan_barang_hilang']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usulan Barang RB</label>
                        <input type="text" class="form-control" name="usulan_barang_rb" value="<?php echo $data_cek['usulan_barang_rb']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usul Hapus</label>
                        <input type="text" class="form-control" name="usul_hapus" value="<?php echo $data_cek['usul_hapus']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hibah DKTP</label>
                        <input type="text" class="form-control" name="hibah_dktp" value="<?php echo $data_cek['hibah_dktp']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Konsensi Jasa</label>
                        <input type="text" class="form-control" name="konsensi_jasa" value="<?php echo $data_cek['konsensi_jasa']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Properti Investasi</label>
                        <input type="text" class="form-control" name="properti_investasi" value="<?php echo $data_cek['properti_investasi']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Dokumen</label>
                        <input type="text" class="form-control" name="jenis_dokumen" value="<?php echo $data_cek['jenis_dokumen']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Dokumen</label>
                        <input type="text" class="form-control" name="no_dokumen" value="<?php echo $data_cek['no_dokumen']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No BPKP</label>
                        <input type="text" class="form-control" name="no_bpkp" value="<?php echo $data_cek['no_bpkp']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Polisi</label>
                        <input type="text" class="form-control" name="no_polisi" value="<?php echo $data_cek['no_polisi']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status Sertifikasi</label>
                        <input type="text" class="form-control" name="status_sertifikasi" value="<?php echo $data_cek['status_sertifikasi']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Sertifikat</label>
                        <input type="text" class="form-control" name="jenis_sertipikat" value="<?php echo $data_cek['jenis_sertipikat']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No Sertifikat</label>
                        <input type="text" class="form-control" name="no_sertifikat" value="<?php echo $data_cek['no_sertifikat']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $data_cek['nama']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Buku Pertama</label>
                        <input type="text" class="form-control" name="tanggal_buku_pertama" value="<?php echo $data_cek['tanggal_buku_pertama']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Perolehan</label>
                        <input type="text" class="form-control" name="tanggal_perolehan" value="<?php echo $data_cek['tanggal_perolehan']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Penghapusan</label>
                        <input type="text" class="form-control" name="tanggal_penghapusan" value="<?php echo $data_cek['tanggal_penghapusan']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Perolehan Pertama</label>
                        <input type="text" class="form-control" name="nilai_perolehan_pertama" value="<?php echo $data_cek['nilai_perolehan_pertama']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Mutasi</label>
                        <input type="text" class="form-control" name="nilai_mutasi" value="<?php echo $data_cek['nilai_mutasi']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Perolehan</label>
                        <input type="text" class="form-control" name="nilai_perolehan" value="<?php echo $data_cek['nilai_perolehan']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Penyusutan</label>
                        <input type="text" class="form-control" name="nilai_penyusutan" value="<?php echo $data_cek['nilai_penyusutan']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nilai Buku</label>
                        <input type="text" class="form-control" name="nilai_buku" value="<?php echo $data_cek['nilai_buku']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Tanah Seluruhnya</label>
                        <input type="text" class="form-control" name="luas_tanah_seluruhnya" value="<?php echo $data_cek['luas_tanah_seluruhnya']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Tanah Bangunan</label>
                        <input type="text" class="form-control" name="luas_tanah_bangunan" value="<?php echo $data_cek['luas_tanah_bangunan']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Sarana Lingkungan</label>
                        <input type="text" class="form-control" name="luas_tanah_sarana_lingkungan" value="<?php echo $data_cek['luas_tanah_sarana_lingkungan']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Lahan Kosong</label>
                        <input type="text" class="form-control" name="luas_lahan_kosong" value="<?php echo $data_cek['luas_lahan_kosong']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Bangunan</label>
                        <input type="text" class="form-control" name="luas_bangunan" value="<?php echo $data_cek['luas_bangunan']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Tapak Bangunan</label>
                        <input type="text" class="form-control" name="luas_tapak_bangunan" value="<?php echo $data_cek['luas_tapak_bangunan']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Luas Pemanfaatan</label>
                        <input type="text" class="form-control" name="luas_pemanfaatan" value="<?php echo $data_cek['luas_pemanfaatan']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jumlah Lantai</label>
                        <input type="text" class="form-control" name="jumlah_lantai" value="<?php echo $data_cek['jumlah_lantai']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jumlah Foto</label>
                        <input type="text" class="form-control" name="jumlah_foto" value="<?php echo $data_cek['jumlah_foto']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status Penggunaan</label>
                        <input type="text" class="form-control" name="status_penggunaan" value="<?php echo $data_cek['status_penggunaan']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No PSP</label>
                        <input type="text" class="form-control" name="no_psp" value="<?php echo $data_cek['no_psp']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal PSP</label>
                        <input type="text" class="form-control" name="tanggal_psp" value="<?php echo $data_cek['tanggal_psp']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $data_cek['alamat']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>RT/RW</label>
                        <input type="text" class="form-control" name="rt_rw" value="<?php echo $data_cek['rt_rw']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelurahan/Desa</label>
                        <input type="text" class="form-control" name="kelurahan_desa" value="<?php echo $data_cek['kelurahan_desa']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" value="<?php echo $data_cek['kecamatan']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kab/Kota</label>
                        <input type="text" class="form-control" name="kab_kota" value="<?php echo $data_cek['kab_kota']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Kab/Kota</label>
                        <input type="text" class="form-control" name="kode_kab_kota" value="<?php echo $data_cek['kode_kab_kota']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" value="<?php echo $data_cek['provinsi']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Provinsi</label>
                        <input type="text" class="form-control" name="kode_provinsi" value="<?php echo $data_cek['kode_provinsi']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" value="<?php echo $data_cek['kode_pos']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>SBSK</label>
                        <input type="text" class="form-control" name="sbsk" value="<?php echo $data_cek['sbsk']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Optimalisasi</label>
                        <input type="text" class="form-control" name="optimalisasi" value="<?php echo $data_cek['optimalisasi']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Penghuni</label>
                        <input type="text" class="form-control" name="penghuni" value="<?php echo $data_cek['penghuni']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pengguna</label>
                        <input type="text" class="form-control" name="pengguna" value="<?php echo $data_cek['pengguna']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode KPKNL</label>
                        <input type="text" class="form-control" name="kode_kpknl" value="<?php echo $data_cek['kode_kpknl']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Uraian KPKNL</label>
                        <input type="text" class="form-control" name="uraian_kpknl" value="<?php echo $data_cek['uraian_kpknl']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Uraian Kanwil DJKN</label>
                        <input type="text" class="form-control" name="uraian_kanwil_djkn" value="<?php echo $data_cek['uraian_kanwil_djkn']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama KL</label>
                        <input type="text" class="form-control" name="nama_kl" value="<?php echo $data_cek['nama_kl']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama E1</label>
                        <input type="text" class="form-control" name="nama_e1" value="<?php echo $data_cek['nama_e1']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Korwil</label>
                        <input type="text" class="form-control" name="nama_korwil" value="<?php echo $data_cek['nama_korwil']; ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Register</label>
                        <input type="text" class="form-control" name="kode_register" value="<?php echo $data_cek['kode_register']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Ruangan</label>
                        <input type="text" class="form-control" name="kode_ruangan" value="<?php echo $data_cek['kode_ruangan']; ?>"/>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer text-right">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
            <a href="?page=kelola_data_bmn" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST['Ubah'])) {

    $sql_ubah = "UPDATE tabel_barang SET
        jenis_bmn='".$_POST['jenis_bmn']."',
        kode_satker='".$_POST['kode_satker']."',
        nama_satker='".$_POST['nama_satker']."',
        kode_barang='".$_POST['kode_barang']."',
        nup='".$_POST['nup']."',
        nama_barang='".$_POST['nama_barang']."',
        merk='".$_POST['merk']."',
        tipe='".$_POST['tipe']."',
        kondisi='".$_POST['kondisi']."',
        umur_aset='".$_POST['umur_aset']."',
        intra_extra='".$_POST['intra_extra']."',
        henti_guna='".$_POST['henti_guna']."',
        status_sbsn='".$_POST['status_sbsn']."',
        status_bmn_idle='".$_POST['status_bmn_idle']."',
        status_kemitraan='".$_POST['status_kemitraan']."',
        bpybds='".$_POST['bpybds']."',
        usulan_barang_hilang='".$_POST['usulan_barang_hilang']."',
        usulan_barang_rb='".$_POST['usulan_barang_rb']."',
        usul_hapus='".$_POST['usul_hapus']."',
        hibah_dktp='".$_POST['hibah_dktp']."',
        konsensi_jasa='".$_POST['konsensi_jasa']."',
        properti_investasi='".$_POST['properti_investasi']."',
        jenis_dokumen='".$_POST['jenis_dokumen']."',
        no_dokumen='".$_POST['no_dokumen']."',
        no_bpkp='".$_POST['no_bpkp']."',
        no_polisi='".$_POST['no_polisi']."',
        status_sertifikasi='".$_POST['status_sertifikasi']."',
        jenis_sertipikat='".$_POST['jenis_sertipikat']."',
        no_sertifikat='".$_POST['no_sertifikat']."',
        nama='".$_POST['nama']."',
        tanggal_buku_pertama='".$_POST['tanggal_buku_pertama']."',
        tanggal_perolehan='".$_POST['tanggal_perolehan']."',
        tanggal_penghapusan='".$_POST['tanggal_penghapusan']."',
        nilai_perolehan_pertama='".$_POST['nilai_perolehan_pertama']."',
        nilai_mutasi='".$_POST['nilai_mutasi']."',
        nilai_perolehan='".$_POST['nilai_perolehan']."',
        nilai_penyusutan='".$_POST['nilai_penyusutan']."',
        nilai_buku='".$_POST['nilai_buku']."',
        luas_tanah_seluruhnya='".$_POST['luas_tanah_seluruhnya']."',
        luas_tanah_bangunan='".$_POST['luas_tanah_bangunan']."',
        luas_tanah_sarana_lingkungan='".$_POST['luas_tanah_sarana_lingkungan']."',
        luas_lahan_kosong='".$_POST['luas_lahan_kosong']."',
        luas_bangunan='".$_POST['luas_bangunan']."',
        luas_tapak_bangunan='".$_POST['luas_tapak_bangunan']."',
        luas_pemanfaatan='".$_POST['luas_pemanfaatan']."',
        jumlah_lantai='".$_POST['jumlah_lantai']."',
        jumlah_foto='".$_POST['jumlah_foto']."',
        status_penggunaan='".$_POST['status_penggunaan']."',
        no_psp='".$_POST['no_psp']."',
        tanggal_psp='".$_POST['tanggal_psp']."',
        alamat='".$_POST['alamat']."',
        rt_rw='".$_POST['rt_rw']."',
        kelurahan_desa='".$_POST['kelurahan_desa']."',
        kecamatan='".$_POST['kecamatan']."',
        kab_kota='".$_POST['kab_kota']."',
        kode_kab_kota='".$_POST['kode_kab_kota']."',
        provinsi='".$_POST['provinsi']."',
        kode_provinsi='".$_POST['kode_provinsi']."',
        kode_pos='".$_POST['kode_pos']."',
        sbsk='".$_POST['sbsk']."',
        optimalisasi='".$_POST['optimalisasi']."',
        penghuni='".$_POST['penghuni']."',
        pengguna='".$_POST['pengguna']."',
        kode_kpknl='".$_POST['kode_kpknl']."',
        uraian_kpknl='".$_POST['uraian_kpknl']."',
        uraian_kanwil_djkn='".$_POST['uraian_kanwil_djkn']."',
        nama_kl='".$_POST['nama_kl']."',
        nama_e1='".$_POST['nama_e1']."',
        nama_korwil='".$_POST['nama_korwil']."',
        kode_register='".$_POST['kode_register']."',
        kode_ruangan='".$_POST['kode_ruangan']."'
        WHERE id_barang='".$_GET['kode']."'";

    $query_ubah = mysqli_query($konek, $sql_ubah);

    if ($query_ubah) {
        echo "
        <script>
            Swal.fire({
                title: 'Ubah Data BMN Berhasil',
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
                title: 'Ubah Data BMN Gagal',
                text: '".mysqli_real_escape_string($konek, mysqli_error($konek))."',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=kelola_data_bmn';
            });
        </script>";
    }
}
?>