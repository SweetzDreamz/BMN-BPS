<?php
include "aksi.php";

if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    $sql_hapus = "DELETE FROM tabel_tiket WHERE kode_ticket='$kode'";
    $query_hapus = mysqli_query($konek, $sql_hapus);
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if ($query_hapus) { ?>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Tiket berhasil dihapus.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location = 'index.php?page=lihat_tiket_keluhan';
        });
    <?php } else { ?>
        Swal.fire({
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat menghapus data.',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location = 'index.php?page=lihat_tiket_keluhan';
        });
    <?php } ?>
</script>
