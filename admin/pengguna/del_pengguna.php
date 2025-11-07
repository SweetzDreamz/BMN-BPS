<?php
if (isset($_GET['kode'])) {
    include "aksi.php"; 

    $kode = $_GET['kode'];
    $sql_hapus = "DELETE FROM tabel_pegawai WHERE NIP='$kode'";
    $query_hapus = mysqli_query($konek, $sql_hapus);

    if ($query_hapus) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Hapus Data Berhasil',
                text: 'Data pengguna telah dihapus.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=data-pengguna';
            });
        </script>";
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Hapus Data Gagal',
                text: 'Terjadi kesalahan saat menghapus data.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=data-pengguna';
            });
        </script>";
    }

    echo "<noscript>
        <meta http-equiv='refresh' content='0;url=index.php?page=data-pengguna'>
    </noscript>";
}
?>
