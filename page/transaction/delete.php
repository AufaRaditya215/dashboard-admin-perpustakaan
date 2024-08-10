<!-- Delete data -->
<?php
    $koneksi = new mysqli("localhost", "root", "", "db_perpus");

    $id = $_GET['id_transaksi'];
    $sql = $koneksi->query("DELETE FROM tb_transaksi WHERE id_transaksi = '$id'");
?>

<!-- Redirect -->
<script>
    alert("Data Transaksi Berhasil Dihapus");
    window.location = "?page=transaction";
</script>