<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_GET['kode'])) {
    include "aksi.php"; 

    $kode = $_GET['kode'];
    $sql_hapus = "DELETE FROM tabel_ruangan WHERE kode_ruangan='$kode'";
    $query_hapus = mysqli_query($konek, $sql_hapus);

    if ($query_hapus) {
        echo "
        <script>
            Swal.fire({
                title: 'Hapus Data Berhasil',
                text: 'Data ruangan telah dihapus.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=kelola_data_ruangan';
            });
        </script>";
    } else {
        echo "
        <script>
            Swal.fire({
                title: 'Hapus Data Gagal',
                text: 'Terjadi kesalahan saat menghapus data.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location = 'index.php?page=kelola_data_ruangan';
            });
        </script>";
    }

    echo "<noscript>
        <meta http-equiv='refresh' content='0;url=index.php?page=kelola_data_ruangan'>
    </noscript>";
}
?>
